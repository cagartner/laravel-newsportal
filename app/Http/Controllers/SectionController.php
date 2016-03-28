<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SectionRequest;
use App\Http\Requests\GeneralRequest;
use App\Section;
use App\News;
use App\News_sections;

use Laracasts\Flash\Flash;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Section::select();
        if (!empty($_GET['name'])){
            $name = $_GET['name'];
            $query->where('name', '=', $name);           
        }
        if (!empty($_GET['activation'])){
            $activation = $_GET['activation'];
            $query->where('activation', '=', $activation);
        }
        $sections = $query->with('mysections')->paginate(15);
        foreach ($sections as $key => $value) {
            $news_sections[$value->id] = News_sections::where('section', '=', $value->id)->where('status', '=', 1)->count();
        }
        $sections_names = Section::all(['name']);
        return view('backend.section.list_sections', compact('sections', 'sections_names', 'news_sections'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $sections = '';
        if($request->input('delete')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $section_id) {
                    $sections .= $section_id . '-';
                }
                return redirect('admin/sections/all/' . $sections . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/sections');
            }
            
        }
        else if($request->input('search')){
            $name = $request->input('name');
            $activation = $request->input('activation');
            return redirect('admin/sections?name='. $name . '&activation='. $activation);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.section.create_section');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $section = new Section;
        $section->name = $request->input('name');
        if ($request->input('activation') == 'checked'){
            $section->activation = 1;
        }
        else{
            $section->activation = 2;
        }
        $section->save();
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/sections');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);
        return view('backend.section.edit_section', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section = Section::find($id);
        $section->name = $request->input('name');
        if ($request->input('activation') == 'checked'){
            $section->activation = 1;
        }
        else{
            $section->activation = 2;
        }
        $section->update();
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/sections');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);
        return view('backend.section.delete_section', compact('section'));
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
        $sections = $tokens[4];
        $explode = explode('-', $sections);
        $arr = array();
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                array_push($arr, $value);
            }
        }
        $sections = Section::whereIn('id', $arr)->get();
        return view('backend.section.delete_sections', compact('sections'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/sections');
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
        $sections = $tokens[4];
        $explode = explode('-', $sections);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $mysections = Section::find($value);
                $mysections->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/sections');
    }
}
