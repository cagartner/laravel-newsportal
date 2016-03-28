<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PageRequest;

use App\Page;
use App\Menu;
use App\MenuLink;

use Laracasts\Flash\Flash;
use Lang;
use Auth;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::paginate(10);
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('backend.pages.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PageRequest $request)
    {
        $page = new Page;
        $page->title = $request->input('title');
        $page->body = $request->input('body');
        $custom_url = $request->input('title');
        $path = str_replace(' ', '-', $custom_url);
        $path = strtolower($path);
        $page_path_db = page::all(['path']);
        $counter = $page_path_db->count();
        foreach ($page_path_db as $key => $value) {
            $slug = $value->path;        
            if ($path == $slug){
                $last_char = substr($slug, -1);
                if (is_numeric($last_char)){
                    $created_char = $last_char + $counter;
                    $path = substr($path, 0, -1);
                    $path = $path . '' . $created_char;
                }
                else{
                    $created_char = 1;
                    $path = $path . '' . $created_char;
                }                
            }
        }
        $page->path = $path;
        $page->created_by = Auth::user()->id;
        if($request->menu_active == '1'){
           $page->menu_active = '1'; 
        }
        $page->save();

        if($request->menu_active == '1'){
           $link = new MenuLink;
           $link->menu_id = $request->menu;
           $link->title = $page->title;
           $link->link = '/page/'.$page->path;
           $link->type_id = '1';//1 for pages
           $link->page_id = $page->id;
           $link->save(); 
        }

        Flash::success(trans('pages.saved_successfully'));
        return redirect('/admin/pages');
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($path)
    {
       $page = Page::where('path', '=', $path)->first();
       return view('frontend.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        $menus = Menu::all();
        $check_link = MenuLink::where('type_id', '=', '1')->where('page_id', '=', $page->id)->first();
        if($check_link){
            $link_menu_id = $check_link->menu_id;
        }   
        return view('backend.pages.edit', compact('page', 'menus', 'link_menu_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PageRequest $request, $id)
    {
        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->body = $request->input('body');
        if($request->menu_active == '1'){
           $page->menu_active = '1'; 
        }
        else{
            $page->menu_active = '0'; 
        }
        $page->save();
        
        if($request->menu_active == '1'){
           $check_link = MenuLink::where('type_id', '=', '1')->where('page_id', '=', $page->id)->first();
           if($check_link){
            $link = $check_link;
           }
           else{
            $link = new MenuLink;
           }
           $link->menu_id = $request->menu;
           $link->title = $page->title;
           $link->link = '/page/'.$page->path;
           $link->type_id = '1';//1 for pages
           $link->page_id = $page->id;
           $link->save(); 
        }
        else{
            $check_link = MenuLink::where('type_id', '=', '1')->where('page_id', '=', $page->id)->first();
           if($check_link){
            $link = $check_link;
            $link->delete(); 
           }
        }
        Flash::success(trans('pages.updated_successfully'));
        return redirect('/admin/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroyconfirm($id)
    {
        $page = Page::find($id);
        return view('backend.pages.confirmdelete', compact('page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        Flash::success(trans('pages.deleted_successfully'));
        return redirect('/admin/pages');
    }

}
