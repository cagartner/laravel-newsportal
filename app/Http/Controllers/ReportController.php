<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GeneralRequest;
use App\Http\Controllers\Controller;

use App\News;
use App\User;
use App\Advertisement;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        $query = News::select();
        if (!empty($_GET['title'])){
            $title = $_GET['title'];
            $query->where('title', 'LIKE', '%'.$title.'%');           
        }
        if (!empty($_GET['created_at'])){
            $created_at = $_GET['created_at'];
            $explode = explode('/', $created_at);
            $created_at = $explode[2] . "-" . $explode[0] . "-" . $explode[1];
            $query->where('created_at', '>', $created_at);           
        }
        if (!empty($_GET['status'])){
            $status = $_GET['status']; 
            $query->where('status', '=', $status);           
        }
        if (!empty($_GET['user_id'])){
            $user_id = $_GET['user_id']; 
            $query->where('user_id', '=', $user_id);           
        }
        $news = $query->get();
        return view('backend.report.list', compact('news', 'users'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $news = '';
        if($request->input('print')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $news_id) {
                    $news .= $news_id . '-';
                }
                return redirect('admin/report/news/print/' . $news);
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/report/news');
            }
            
        }
        else if($request->input('search')){
            $title = $request->input('title');
            $status = $request->input('status');
            $created_at = $request->input('created_at');
            $user_id = $request->input('user_id');
            return redirect('admin/report/news?title='. $title . '&status='. $status . '&created_at=' . $created_at . '&user_id=' . $user_id);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $creates_arr = array();
        $today = date('d/m/Y');
        $users = User::where('id', '!=', 1)->get();
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $news = $tokens[5];
        if (!empty($news)){
            $explode = explode('-', $news);
            $arr = array();
            foreach ($explode as $key => $value) {
                $mynews = News::where('id', '=', $value)->first();
                if (!empty($mynews)) {
                   $creates = News::where('user_id', '=', $mynews->user_id)->count();
                }
                array_push($creates_arr, $creates);
                if (!empty($value)){
                    array_push($arr, $value);
                }
            }
            $news = News::whereIn('id', $arr)->get();
        }
        else{
            $news = News::where('user_id', '=', $tokens[5])->get();
        }
        return view('backend.report.print', compact('news', 'users', 'today', 'creates_arr'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_adv()
    {
        $query = Advertisement::select();
        if (!empty($_GET['title'])){
            $title = $_GET['title'];
            $query->where('title', 'LIKE', '%'.$title.'%');           
        }
        if (!empty($_GET['start'])){
            $start = $_GET['start'];
            $explode = explode('/', $start);
            $start = $explode[2] . "-" . $explode[0] . "-" . $explode[1];
            $query->where('start', '>', $start);           
        }
        if (!empty($_GET['status'])){
            $status = $_GET['status']; 
            $query->where('status', '=', $status);           
        }
        if (!empty($_GET['user_id'])){
            $user_id = $_GET['user_id']; 
            $query->where('user_id', '=', $user_id);           
        }
        $adv = $query->get();
        $users = User::where('id', '!=', 1)->get();
        $today = date('Y-m-d');
        return view('backend.report.list_adv', compact('adv', 'users', 'today'));
    }

     /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations_adv(GeneralRequest $request)
    {
        $adv = '';
        if($request->input('print')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $adv_id) {
                    $adv .= $adv_id . '-';
                }
                return redirect('admin/report/advertisements/print/' . $adv);
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/report/advertisements');
            }
            
        }
        else if($request->input('search')){
            $title = $request->input('title');
            $status = $request->input('status');
            $start = $request->input('start');
            $user_id = $request->input('user_id');
            return redirect('admin/report/advertisements?title='. $title . '&status='. $status . '&start=' . $start . '&user_id=' . $user_id);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_adv()
    {
        $creates_arr = array();
        $today = date('Y-m-d');
        $users = User::where('id', '!=', 1)->get();
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $advs = $tokens[5];
        if (!empty($advs)){
            $explode = explode('-', $advs);
            $arr = array();
            foreach ($explode as $key => $value) {
                $mynews = Advertisement::where('id', '=', $value)->first();
                if (!empty($mynews)) {
                   $creates = Advertisement::where('user_id', '=', $mynews->user_id)->count();
                }
                array_push($creates_arr, $creates);
                if (!empty($value)){
                    array_push($arr, $value);
                }
            }
            $advs = Advertisement::whereIn('id', $arr)->get();
        }
        else{
            $advs = Advertisement::where('user_id', '=', $tokens[5])->get();
        }
        return view('backend.report.print_adv', compact('advs', 'users', 'today', 'creates_arr'));
    }

}
