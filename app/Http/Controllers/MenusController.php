<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MenuRequest;
use App\Http\Controllers\Controller;

use App\Menu;
use App\MenuLink;
use App\Page;

use Laracasts\Flash\Flash;
use Lang;
use Response;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $menus = Menu::paginate(10);
        return view('backend.menus.index', compact('menus'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function list_links($menu_id)
    {
        $menu = Menu::find($menu_id);
        $links = MenuLink::where('menu_id', '=', $menu_id)->orderBy('order', 'ASC')->get();
        return view('backend.menus.links.index', compact('menu', 'links'));
    }

    /**
     * sort menu links.
     *
     * @param  Request  $request
     * @return Response
     */
    public function save(Request $request, $id)
    {
        $data = json_decode($request->data);
        // level 0
        foreach ($data as $key => $value) {
            $link = MenuLink::find($value->id);
            if(!empty($value->children)){
                $link->has_children = 1;
                //level 1
                foreach ($value->children as $key_1 => $value_1) {
                    $link_1 = MenuLink::find($value_1->id);
                    if(!empty($value_1->children)){
                        $link_1->has_children = 1;
                        // level 2
                        foreach ($value_1->children as $key_2 => $value_2) {
                            $link_2 = MenuLink::find($value_2->id);
                            if(!empty($value_2->children)){
                            $link_2->has_children = 1;
                                // level 3
                                foreach ($value_2->children as $key_3 => $value_3) {
                                    $link_3 = MenuLink::find($value_3->id);
                                    if(!empty($value_3->children)){
                                        $link_3->has_children = 1;
                                        //level 4
                                        foreach ($value_3->children as $key_4 => $value_4) {
                                            $link_4 = MenuLink::find($value_4->id);
                                            $link_4->parent = $link_3->id;
                                            $link_4->order = $key_4;
                                            $link_4->save();
                                        }
                                    }
                                    else{
                                        $link_3->has_children = 0;
                                    }
                                    $link_3->parent = $link_2->id;
                                    $link_3->order = $key_3;
                                    $link_3->save();
                                }
                            }
                            else{
                                $link_2->has_children = 0;
                            }
                            $link_2->parent = $link_1->id;
                            $link_2->order = $key_2;
                            $link_2->save();
                            }
                    }
                    else{
                        $link_1->has_children = 0;
                    }
                    $link_1->parent = $link->id;
                    $link_1->order = $key_1;
                    $link_1->save();
                }
            }
            else{
                $link->has_children = 0;
            }
            $link->parent = '0';
            $link->order = $key;
            $link->save();
        }

       // return Response::json( $value->id );
        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create_link()
    {
        $menus = Menu::all();
        return view('backend.menus.links.create', compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function store_link(MenuRequest $request)
    {
        $link = new MenuLink;
        $link->title = $request->title;
        $link->menu_id = $request->menu;
        $link->link = $request->link;
        $link->save();

        Flash::success("Created Successfully");
        return redirect('/admin/menus/'.$link->menu_id.'/links');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit_link($menu_id, $link_id)
    {
        $link = MenuLink::find($link_id);
        $menus = Menu::all();
        return view('backend.menus.links.edit', compact('menus', 'link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update_link(MenuRequest $request, $menu_id, $link_id)
    {
        $link = MenuLink::find($link_id);
        $link->title = $request->title;
        $link->link = $request->link;
        $link->menu_id = $request->menu;
        $link->save();

        Flash::success("Updated Successfully");
        return redirect('/admin/menus/'.$menu_id.'/links');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete_link($menu_id, $link_id)
    {
        $link = MenuLink::find($link_id);
        return view('backend.menus.links.confirmdelete', compact('link'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_link($menu_id, $link_id)
    {
        $link = MenuLink::find($link_id);
        $childs = MenuLink::where('parent', '=', $link_id)->get();
        foreach ($childs as $child) {
            $child->parent = '0';
            $child->save();
        }
        if($link->type_id == '1'){ 
            $relation = Page::find($link->page_id);
            $relation->menu_active = '0';
            $relation->save();
        }

        $link->delete();

        Flash::success("Deleted Successfully");
        return redirect('/admin/menus/'.$menu_id.'/links');
    }
}