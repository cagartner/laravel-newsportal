<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\GroupRequest;
use App\Http\Requests\GeneralRequest;
use App\Group;
use App\User;
use App\Permission;
use Auth;
use Laracasts\Flash\Flash;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Group::with('users')->where('id', '!=', 1)->select();
        if (!empty($_GET['name'])){
            $name = $_GET['name'];
            $query->where('name', '=', $name);           
        }
        if (!empty($_GET['description'])){
            $description = $_GET['description'];
            $query->where('description', 'LIKE', '%'.$description.'%');
        }
        $groups = $query->paginate(15);
        $groups_names = Group::where('id', '!=', 1)->get(['name']);
        return view('backend.group.list_groups', compact('groups', 'groups_names'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $groups = '';
        if($request->input('delete')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $group_id) {
                    $groups .= $group_id . '-';
                }
                return redirect('admin/groups/all/' . $groups . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/groups');
            }
            
        }
        else if($request->input('search')){
            $name = $request->input('name');
            $description = $request->input('description');
            return redirect('admin/groups?name='. $name . '&description='. $description);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.group.create_group');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $group = new Group;
        $group->create($request->all());
        $last_group = Group::orderBy('id', 'desc')->first(); 
        for ($i=1; $i <= 14 ; $i++) {
            $permission = new Permission;
            $permission->group_id = $last_group->id;
            $permission->permission = $i;
            $checkbox = 'permission' . $i;
            if ($request->$checkbox == 1 ){
                $permission->status = 1;
            }
            else{
                $permission->status = 2;
            }       
            $permission->save();
        }
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/groups');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $group_id = $tokens[3];
        $user_id = Auth::user()->id;
        if ($group_id == 1 && $user_id != 1){
            return redirect('admin/groups');
        }
        $mypermissions = Permission::where('group_id', '=', $id)->get();
        $group = Group::find($id);
        return view('backend.group.edit_group', compact('group', 'mypermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
        $group = Group::find($id);
        $group->update($request->all());
        Permission::where('group_id', '=', $id)->delete();
        $last_group = Group::where('id', '=', $id)->first(); 
        for ($i=1; $i <= 14 ; $i++) {
            $permission = new Permission;
            $permission->group_id = $last_group->id;
            $permission->permission = $i;
            $checkbox = 'permission' . $i;
            if ($request->$checkbox == 1 ){
                $permission->status = 1;
            }
            else{
                $permission->status = 2;
            }       
            $permission->save();
        }

        Flash::success('تم التعديل بنجاح');
        return redirect('admin/groups');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        return view('backend.group.delete_group', compact('group'));
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
        $groups = $tokens[4];
        $explode = explode('-', $groups);
        $arr = array();
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                array_push($arr, $value);
            }
        }
        $groups = Group::whereIn('id', $arr)->get();
        return view('backend.group.delete_groups', compact('groups'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        Permission::where('group_id', '=', $id)->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/groups');
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
        $groups = $tokens[4];
        $explode = explode('-', $groups);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $mygroups = Group::find($value);
                $mygroups->delete();
                Permission::where('group_id', '=', $value)->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $user_id = Auth::user()->id;
        $group = User::find($user_id);
        $permissions = Permission::where('group_id', '=', $group->group_id)->get();
        return $permissions;
    }
}
