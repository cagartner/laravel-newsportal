<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\RenewAdvRequest;

use App\Advertisement;
use App\AdvertisementImages;
use App\User;

use Intervention\Image\Facades\Image;

use Laracasts\Flash\Flash;
use Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $adv = $query->paginate(15);
        $users = User::all();
        $today = date('Y-m-d');
        return view('backend.advertisement.list', compact('adv', 'users', 'today'));
    }

     /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $adv = '';
        if($request->input('delete')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $adv_id) {
                    $adv .= $adv_id . '-';
                }
                return redirect('admin/advertisements/all/' . $adv . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/advertisements');
            }
            
        }
        else if($request->input('search')){
            $title = $request->input('title');
            $status = $request->input('status');
            $start = $request->input('start');
            return redirect('admin/advertisements?title='. $title . '&status='. $status . '&start=' . $start);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementRequest $request)
    {
        $adv = new Advertisement;
        $user_id = Auth::user()->id;
        $adv->user_id = $user_id;
        $adv->title = $request->title;
        $start_date = $request->start;
        $explode = explode('/', $start_date);
        $start_date = $explode[2] . "-" . $explode[0] . "-" . $explode[1];
        $adv->start = $start_date;
        $end_date = $request->end;
        $explode = explode('/', $end_date);
        $end_date = $explode[2] . "-" . $explode[0] . "-" . $explode[1];
        $adv->end = $end_date;
        $adv->cost = $request->cost;
        $adv->discount = $request->discount;
        $adv->comment = $request->comment;
        if ($request->input('status') == 'checked'){
            $adv->status = 1;       
        }
        else{
            $adv->status = 2;
        }
        $adv->position = $request->position;
        $adv->renewal = 2; // New advertisement
        $adv->save();
        $last_adv = Advertisement::orderBy('id', 'desc')->first();
        $file = $request->file('basic_photo');
        if (!empty($file)){
                if (empty($file)){
                    break;
                }
                $rules = array(
                   'image' => 'required|mimes:png,gif,jpeg,jpg|max:1000'
                );
                $destinationPath = 'img/advertisements';
                $filename = $file->getClientOriginalName();
                  $mime_type = $file->getMimeType();
                  $extension = $file->getClientOriginalExtension();
                  $random_name = str_random(14).'.'.$extension;
                $upload_success = $file->move($destinationPath, $random_name );
                //small
                $small_dir = 'img/advertisements/small/'.$random_name.'';
                $small= Image::make($upload_success)->resize(468, 60);
                $small->save($small_dir);

                //thumbnail
                $thumbnail_dir = 'img/advertisements/thumbinal/'.$random_name.'';
                $thumb = Image::make($upload_success)->resize(300, 132);
                $thumb->save($thumbnail_dir);

                //meduim
                $medium_dir = 'img/advertisements/medium/'.$random_name.'';
                $medium = Image::make($upload_success)->resize(336, 280);
                $medium->save($medium_dir );

                //Large
                $large_dir = 'img/advertisements/large/'.$random_name.'';
                $large = Image::make($upload_success)->resize(728, 90);
                $large->save($large_dir);

                $image = new AdvertisementImages;
                $image->advertisement_id = $last_adv->id;
                $image->original_size = 'img/advertisements/'.$random_name.'';
                $image->small = $small_dir;
                $image->thumbnail = $thumbnail_dir;
                $image->medium = $medium_dir;
                $image->large= $large_dir;
                $image->save();
        }
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/advertisements');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adv = Advertisement::with('images')->find($id);
        return view('backend.advertisement.edit', compact('adv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementRequest $request, $id)
    {
        $adv = Advertisement::find($id);
        $user_id = Auth::user()->id;
        $adv->user_id = $user_id;
        $adv->title = $request->title;
        $start_date = $request->start;
        $explode = explode('/', $start_date);
        if (!empty($explode[1])){
            $start_date = $explode[2] . "-" . $explode[0] . "-" . $explode[1];
        }
        $adv->start = $start_date;
        $end_date = $request->end;
        $explode = explode('/', $end_date);
        if (!empty($explode[1])){
            $end_date = $explode[2] . "-" . $explode[0] . "-" . $explode[1];
        }
        $adv->end = $end_date;
        $adv->cost = $request->cost;
        $adv->discount = $request->discount;
        $adv->comment = $request->comment;
        if ($request->input('status') == 'checked'){
            $adv->status = 1;       
        }
        else{
            $adv->status = 2;
        }
        $adv->position = $request->position;
        $adv->renewal = 2; // New advertisement
        $adv->update();
        $last_adv = $id;
        $file = $request->file('basic_photo');
        if (!empty($file)){
                AdvertisementImages::where('advertisement_id', '=', $id)->delete();
                if (empty($file)){
                    break;
                }
                $rules = array(
                   'image' => 'required|mimes:png,gif,jpeg,jpg|max:1000'
                );
                $destinationPath = 'img/advertisements';
                $filename = $file->getClientOriginalName();
                  $mime_type = $file->getMimeType();
                  $extension = $file->getClientOriginalExtension();
                  $random_name = str_random(14).'.'.$extension;
                $upload_success = $file->move($destinationPath, $random_name );
                //small
                $small_dir = 'img/advertisements/small/'.$random_name.'';
                $small= Image::make($upload_success)->resize(468, 60);
                $small->save($small_dir);

                //thumbnail
                $thumbnail_dir = 'img/advertisements/thumbinal/'.$random_name.'';
                $thumb = Image::make($upload_success)->resize(300, 132);
                $thumb->save($thumbnail_dir);

                //meduim
                $medium_dir = 'img/advertisements/medium/'.$random_name.'';
                $medium = Image::make($upload_success)->resize(336, 280);
                $medium->save($medium_dir );

                //Large
                $large_dir = 'img/advertisements/large/'.$random_name.'';
                $large = Image::make($upload_success)->resize(728, 90);
                $large->save($large_dir);

                $image = new AdvertisementImages;
                $image->advertisement_id = $last_adv;
                $image->original_size = 'img/advertisements/'.$random_name.'';
                $image->small = $small_dir;
                $image->thumbnail = $thumbnail_dir;
                $image->medium = $medium_dir;
                $image->large= $large_dir;
                $image->save();
        }
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/advertisements');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisement = Advertisement::find($id);
        return view('backend.advertisement.delete', compact('advertisement'));
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
        $advertisement = $tokens[4];
        $explode = explode('-', $advertisement);
        $arr = array();
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                array_push($arr, $value);
            }
        }
        $advertisement = Advertisement::whereIn('id', $arr)->get();
        return view('backend.advertisement.delete_all', compact('advertisement'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/advertisements');
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
        $advertisement = $tokens[4];
        $explode = explode('-', $advertisement);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $myadvertisement = Advertisement::find($value);
                $myadvertisement->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/advertisements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function renew()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $adv_id = $tokens[3];
        $old_adv = Advertisement::find($adv_id);
        return view('backend.advertisement.renew', compact('old_adv'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function post_renew(RenewAdvRequest $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $adv_id = $tokens[3];
        $old_adv = Advertisement::find($adv_id);
        $adv = new Advertisement;
        $user_id = $old_adv->user_id;
        $adv->user_id = $user_id;
        $adv->title = $old_adv->title;
        $start_date = $request->start;
        $explode = explode('/', $start_date);
        if (!empty($explode[1])){
            $start_date = $explode[2] . "-" . $explode[0] . "-" . $explode[1];
        }
        $adv->start = $start_date;
        $end_date = $request->end;
        $explode = explode('/', $end_date);
        if (!empty($explode[1])){
            $end_date = $explode[2] . "-" . $explode[0] . "-" . $explode[1];
        }
        $adv->end = $end_date;
        $adv->cost = $request->cost;
        $adv->discount = $request->discount;
        $adv->comment = $request->comment;
        $adv->status = 1;
        $adv->position = $old_adv->position;
        $adv->renewal = 1; // renew advertisement
        $adv->save();

        $images = AdvertisementImages::where('advertisement_id', '=', $old_adv->id)->first();
        $new_rew = new AdvertisementImages;
        $last_adv = Advertisement::orderBy('id', 'desc')->first();
        $new_rew->advertisement_id = $last_adv->id;
        $new_rew->original_size = $images->original_size;
        $new_rew->small = $images->small;
        $new_rew->thumbnail = $images->thumbnail;
        $new_rew->medium = $images->medium;
        $new_rew->large = $images->large;
        $new_rew->save();
        Flash::success("تم التجديد بنجاح");
        return redirect('admin/advertisements');
    }
}
