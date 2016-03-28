<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\GroupRequest;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Http\Requests\EditRegisterRequest;
use App\Group;
use App\User;
use Auth;

use Laracasts\Flash\Flash;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Group::where('id', '!=', 1)->select();
        if (!empty($_GET['name'])){
            $name = $_GET['name'];
            $query->where('name', '=', $name);           
        }
        $groups = $query->get();
        $groups_names = Group::where('id', '!=', 1)->get(['name']);
        $user_query = User::select();
        if (!empty($_GET['user_name'])){
            $name = $_GET['user_name'];
            $user_query->where('name', 'LIKE', '%'.$name.'%');           
        }
        if (!empty($_GET['phone'])){
            $phone = $_GET['phone'];
            $user_query->where('phone', '=', $phone);           
        }
        if (!empty($_GET['created_at'])){
            $created_at = $_GET['created_at'];
            $explode = explode('/', $created_at);
            $created_at = $explode[2] . "-" . $explode[0] . "-" . $explode[1];
            $user_query->where('created_at', '>', $created_at);           
        }
        if (!empty($_GET['activation'])){
            $activation = $_GET['activation']; 
            $user_query->where('confirmed', '=', $activation);           
        }
        $users = $user_query->where('id', '!=', 1)->paginate(15);
        return view('backend.users.list_users', compact('groups', 'groups_names', 'users'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $users = '';
        if($request->input('delete')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $user_id) {
                    $users .= $user_id . '-';
                }
                return redirect('admin/admins/all/' . $users . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/admins');
            }
            
        }
        else if($request->input('search')){
            $name = $request->input('name');
            $user_name = $request->input('user_name');
            $phone = $request->input('phone');
            $created_at = $request->input('created_at');
            $activation = $request->input('activation');
            return redirect('admin/admins?name='. $name . '&user_name='. $user_name . '&phone=' . $phone . '&created_at=' . $created_at . '&activation=' . $activation);
        }
        else if($request->input('reset')){
            return redirect('admin/admins');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $myuser_id = $tokens[3];
        if ($myuser_id == 1 && $user_id != 1){
            return redirect('admin/admins');
        }
        if ($user_id !=1){
            if ($id == 1){
                Flash::success('عضو غير موجود');
                return redirect('admin/admins');
            }
        }
        $user = User::find($id);
        $groups = Group::where('id', '!=', 1)->get();
        return view('backend.users.edit_user', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRegisterRequest $request, $id)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $user_id = $tokens[3];
        $user = User::where('id', '=', $user_id)->first();
        $emails = User::where('id', '!=', $user_id)->get();
        $user->name = $request->input('name');
        foreach ($emails as $key => $value) {
            if ($value->email ==  $request->input('email')){
                Flash::error('تم تفعيل هذا البريد من قبل');
                return redirect('admin/admins/' . $id . '/edit');
            }
            else{
                $user->email = $request->input('email');
            }
        }
        if (!empty($request->input('password'))){
            if (strlen($request->input('password')) < 8){
                Flash::error('كلمة السر يجب الا تقل عن 8 (ارقام او حروف او ..)');
                return redirect('admin/admins/' . $user_id . '/edit');
            }
            if ($request->input('password') == $request->input('password_confirmation')){
                $user->password = bcrypt($request->input('password'));
            }
            else{
                Flash::error('كلمة السر غير متابقة للتأكيد');
                return redirect('admin/admins/' . $user_id . '/edit');
            }
        }
        $user->group_id = $request->input('group');
        if ($request->input('activation') == "checked"){
                    $user->confirmed = 1;
                }
                else{
                    $user->confirmed = 2;
                }
        $file = $request->file('basic_photo');
                if (!empty($file)){
                    $user->basic_photo = $file->getClientOriginalName();
                    $file = $file->move('img/users/', $file->getClientOriginalName());
                }
        $phone = $request->input('phone');
        $user->phone = $phone;
        $user->update();
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/admins');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.delete_user', compact('user'));
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
        $users = $tokens[4];
        $explode = explode('-', $users);
        $arr = array();
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                array_push($arr, $value);
            }
        }
        $users = User::whereIn('id', $arr)->get();
        return view('backend.users.delete_users', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/admins');
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
        $users = $tokens[4];
        $explode = explode('-', $users);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $myusers = User::find($value);
                $myusers->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/admins');
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit_profile()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', '=', $user_id)->first();
        $groups = Group::where('id', '!=', 1)->get();
        return view('backend.users.edit_profile', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(EditRegisterRequest $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', '=', $user_id)->first();
        $emails = User::where('id', '!=', $user_id)->get();
        $user->name = $request->input('name');
        foreach ($emails as $key => $value) {
            if ($value->email ==  $request->input('email')){
                Flash::error('تم تفعيل هذا البريد من قبل');
                return redirect('admin/profile');
            }
            else{
                $user->email = $request->input('email');
            }
        }
        if (!empty($request->input('password'))){
            if (strlen($request->input('password')) < 8){
                Flash::error('كلمة السر يجب الا تقل عن 8 (ارقام او حروف او ..)');
                return redirect('admin/profile');
            }
            if ($request->input('password') == $request->input('password_confirmation')){
                $user->password = bcrypt($request->input('password'));
            }
            else{
                Flash::error('كلمة السر غير متابقة للتأكيد');
                return redirect('admin/profile');
            }
        }
        $user->group_id = $request->input('group');
        if ($request->input('activation') == "checked"){
                    $user->confirmed = 1;
                }
                else{
                    $user->confirmed = 2;
                }
        $file = $request->file('basic_photo');
                if (!empty($file)){
                    $user->basic_photo = $file->getClientOriginalName();
                    $file = $file->move('img/users/', $file->getClientOriginalName());
                }
        $phone = $request->input('phone');
        $user->phone = $phone;
        $user->update();
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/profile');
    }
}
