<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\OpinionRequest;
use App\Http\Requests\OpinionOptionsRequest;
use App\Http\Requests\GeneralRequest;
use App\Opinion;
use App\OpinionOptions;
use App\User;

use Laracasts\Flash\Flash;
use Auth;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Opinion::select();
        if (!empty($_GET['question'])){
            $question = $_GET['question'];
            $query->where('question', 'LIKE', '%'.$question.'%');           
        }
        if (!empty($_GET['status'])){
            $status = $_GET['status'];
            $query->where('status', '=', $status);
        }
        $opinions = $query->paginate(15);
        $users = User::all();
        return view('backend.opinion.list_opinions', compact('opinions', 'users'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $opinions = '';
        if($request->input('delete')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $opinion_id) {
                    $opinions .= $opinion_id . '-';
                }
                return redirect('admin/opinions/all/' . $opinions . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/opinions');
            }
            
        }
        else if($request->input('search')){
            $question = $request->input('question');
            $status = $request->input('status');
            return redirect('admin/opinions?question='. $question . '&status='. $status);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.opinion.create_opinion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpinionRequest $request)
    {
        $opinion = new Opinion;
        $opinion->question = $request->input('question');
        if ($request->input('status') == 'checked'){
            $opinion->status = 1;
        }
        else{
            $opinion->status = 2;
        }
        $user_id = Auth::user()->id;
        $opinion->user_id = $user_id;
        $opinion->save();
        $opinion_info = Opinion::orderBy('id', 'desc')->first();
        $last_opinion_id = $opinion_info['attributes']['id'];
        $count = $request->input('counter');
        for ($i=1; $i <= $count; $i++) {
            $options = new OpinionOptions; 
            $input_name = "option" . $i;
            $options->option = $request->input($input_name);
            $options->opinion_id = $last_opinion_id;
            $options->counter = $i;
            if (!empty($request->input($input_name))){
                $options->save();
            }
        }
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/opinions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opinion = Opinion::find($id);
        $opinion_id = $opinion['attributes']['id'];
        $options = OpinionOptions::where('opinion_id', '=', $opinion_id)->get();
        return view('backend.opinion.edit_opinion', compact('opinion', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OpinionRequest $request, $id)
    {
        $opinion = Opinion::find($id);
        $opinion->question = $request->input('question');
        if ($request->input('status') == 'checked'){
            $opinion->status = 1;
        }
        else{
            $opinion->status = 2;
        }
        $user_id = Auth::user()->id;
        $opinion->user_id = $user_id;
        $opinion->update();
        $opinion_id = $id;
        OpinionOptions::where('opinion_id', '=', $opinion_id)->delete();
        $count = $request->input('counter');
        for ($i=1; $i <= $count; $i++) {
            $options = new OpinionOptions; 
            $input_name = "option" . $i;
            $options->option = $request->input($input_name);
            $options->opinion_id = $opinion_id;
            $options->counter = $i;
            if (!empty($request->input($input_name))){
                $options->save();
            }
        }
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/opinions');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $opinion = Opinion::find($id);
        return view('backend.opinion.delete_opinion', compact('opinion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_all($id)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $opinions = $tokens[4];
        $explode = explode('-', $opinions);
        $arr = array();
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                array_push($arr, $value);
            }
        }
        $opinions = Opinion::whereIn('id', $arr)->get();
        return view('backend.opinion.delete_opinions', compact('opinions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opinion = Opinion::find($id);
        OpinionOptions::where('opinion_id', '=', $id)->delete();
        $opinion->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/opinions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_all()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $opinions = $tokens[4];
        $explode = explode('-', $opinions);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $myopinions = Opinion::find($value);
                OpinionOptions::where('opinion_id', '=', $value)->delete();
                $myopinions->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/opinions');
    }
}
