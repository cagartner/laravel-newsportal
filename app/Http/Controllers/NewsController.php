<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\EditNewsRequest;
use App\Http\Requests\GeneralRequest;
use App\Http\Controllers\Controller;

use App\Section;
use App\News;
use App\News_features;
use App\News_photo_album;
use App\News_photo_album_photos;
use App\News_sections;
use App\News_tags;
use App\News_video_album;
use App\News_video_album_videos;
use App\NewsBasicPhoto;

use Auth;
use Input;

use Intervention\Image\Facades\Image;

use Laracasts\Flash\Flash;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $news = $query->paginate(15);
        return view('backend.news.list_news', compact('news'));
    
    }


    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $news = '';
        if($request->input('delete')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $news_id) {
                    $news .= $news_id . '-';
                }
                return redirect('admin/news/all/' . $news . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/news');
            }
            
        }
        else if($request->input('search')){
            $title = $request->input('title');
            $status = $request->input('status');
            $created_at = $request->input('created_at');
            return redirect('admin/news?title='. $title . '&status='. $status . '&created_at=' . $created_at);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        $tags = News_tags::groupBy('tags')->get();
        return view('backend.news.news_create', compact('sections', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = new News;
        $news->title = $request->input('title');
        $custom_url = $request->input('title');
        $path = str_replace(' ', '-', $custom_url);
        $path = str_replace('/', '-', $custom_url);
        $page_path_db = News::all(['link']);
        foreach ($page_path_db as $key => $value) {
            $slug = $value->path;        
            if ($path == $slug){
                $last_char = substr($slug, -1);
                if (is_numeric($last_char)){
                    $created_char = $last_char + 1;
                    $path = substr($path, 0, -1);
                    $path = $path . '' . $created_char;
                }
                else{
                    $created_char = 1;
                    $path = $path . '' . $created_char;
                }                
            }
        }
        $news->link = $path;
        $news->summary = $request->input('summary');
        $news->subject = $request->input('news_subject');
        $news->status = $request->status;
        $news->comments_status = $request->comments;
        $news->author = $request->author;
        if ($request->input('publish') == 'checked'){
            $news->publish_facebook = 1;       
        }
        else{
            $news->publish_facebook = 2;
        }
        $user_id = Auth::user()->id;
        $news->user_id = $user_id;
        $news->advantage = $request->input('advantage');
        $news->save();
        $last_news = News::orderBy('id', 'desc')->first(); 
        for ($i=1; $i < 7; $i++) { 
            
                $news_features = new News_features;
                $news_features->feature = $i; 
                $news_features->news_id = $last_news->id;
                     
            if ($request->input($i) == 'checked'){
                $news_features->status = 1;
            }
            else{
                $news_features->status = 2;
            }
            $news_features->save();
        }
        $sections = Section::all();
        foreach ($sections as $key => $value) {
            $section_id = $value->id;
            $news_sections = new News_sections;
            $news_sections->section = $section_id; 
            $news_sections->news_id = $last_news->id; 
            if ($request->input($section_id) == 'checked'){
                $news_sections->status = 1;
            }
            else{
                $news_sections->status = 2;   
            }
            $news_sections->save(); 
        }

        $news_palbum = new News_photo_album;
        $news_palbum->name = $request->pablum_name;
        $news_palbum->photographer = $request->pablum_photographer;
        $news_palbum->summary = $request->pablum_summary;
        $news_palbum->subject = $request->pablum_subject;
        if ($request->input('palbum_publish_on_home') == 'checked'){
            $news_palbum->publish_on_home = 1;       
        }
        else{
            $news_palbum->publish_on_home = 2;
        }
        $news_palbum->news_id = $last_news->id;
        $news_palbum->save();

        $files = $request->file('files');
        if (!empty($files)){
        foreach($files as $file) {
            if (empty($file)){
                break;
            }
            $rules = array(
               'image' => 'mimes:png,gif,jpeg,jpg|max:1000'
           );
           $validator = \Validator::make(array('image'=> $file), $rules);
           if($validator->passes()){
                $destinationPath = 'img/news/palbum';
                $filename = $file->getClientOriginalName();
                  $mime_type = $file->getMimeType();
                  $extension = $file->getClientOriginalExtension();
                  $random_name = str_random(14).'.'.$extension;
                $upload_success = $file->move($destinationPath, $random_name );
                //small
                $small_dir = 'img/news/palbum/small/'.$random_name.'';
                $small= Image::make($upload_success)->resize(76, 76);
                $small->save($small_dir);

                //thumbnail
                $thumbnail_dir = 'img/news/palbum/thumbinal/'.$random_name.'';
                $thumb = Image::make($upload_success)->resize(300, 132);
                $thumb->save($thumbnail_dir);

                //meduim
                $medium_dir = 'img/news/palbum/medium/'.$random_name.'';
                $medium = Image::make($upload_success)->resize(600, 398);
                $medium->save($medium_dir );

                //Large
                $large_dir = 'img/news/palbum/large/'.$random_name.'';
                $large = Image::make($upload_success)->resize(1600, 972);
                $large->save($large_dir);

                $image = new News_photo_album_photos;
                $news_palbum = News_photo_album::orderBy('id', 'desc')->first();
                $last_news_palbum_id = $news_palbum->id;
                $image->news_photo_album_id = $last_news_palbum_id;
                $image->original_size = 'img/news/palbum/'.$random_name.'';
                $image->small = $small_di;
                $image->thumbnail = $thumbnail_dir;
                $image->medium = $medium_dir;
                $image->large= $large_dir;
                $image->save();
            }
            else
            {
                $errors = $validator->errors()->all();
                return redirect()->back()->withErrors($errors)->withInput();
            }
        }
        }

        $news_valbum = new News_video_album;
        $news_valbum->name = $request->vablum_name;
        $news_valbum->photographer = $request->vablum_photographer;
        $news_valbum->summary = $request->vablum_summary;
        $news_valbum->subject = $request->vablum_subject;
        if ($request->input('valbum_publish_on_home') == 'checked'){
            $news_valbum->publish_on_home = 1;       
        }
        else{
            $news_valbum->publish_on_home = 2;
        }
        $news_valbum->news_id = $last_news->id;
        $news_valbum->save();

        $count = $request->input('counter');
        $valbum = News_video_album::orderBy('id', 'desc')->first();
        $last_valbum_id = $valbum['attributes']['id'];
        for ($i=1; $i <= $count; $i++) {
            $videos = new News_video_album_videos; 
            $input_name = "vablum_videos_" . $i;
            $videos->video = $request->input($input_name);
            $videos->News_video_album_id = $last_valbum_id;
            if (!empty($request->input($input_name))){
                $videos->save();
            }
        }

                
        $mytags = $request->input('auto_tags');
        if (!empty($mytags)){
            foreach ($mytags as $key => $value) {
                $save_tags = new News_tags;
                $save_tags->news_id = $last_news->id;
                $save_tags->tags = $value;
                $save_tags->save();
            }
        }

        $newtags = $request->input('new_tag');
        if (!empty($newtags)){
            $explode = explode('#', $newtags);
            foreach ($explode as $key => $value) {
                if (!empty($value)){
                    $save_newtags = new News_tags;
                    $save_newtags->news_id = $last_news->id;
                    $save_newtags->tags = $value;
                    $save_newtags->save();
                }
            }
        }
        $file = $request->file('basic_photo');
        if (!empty($file)){
            if (empty($file)){
                break;
            }
                $destinationPath = 'img/news/basic_photo';
                $filename = $file->getClientOriginalName();
                  $mime_type = $file->getMimeType();
                  $extension = $file->getClientOriginalExtension();
                  $random_name = str_random(14).'.'.$extension;
                $upload_success = $file->move($destinationPath, $random_name );
                //small
                $small_dir = 'img/news/basic_photo/small/'.$random_name.'';
                $small= Image::make($upload_success)->resize(76, 76);
                $small->save($small_dir);

                //thumbnail
                $thumbnail_dir = 'img/news/basic_photo/thumbinal/'.$random_name.'';
                $thumb = Image::make($upload_success)->resize(300, 132);
                $thumb->save($thumbnail_dir);

                //meduim
                $medium_dir = 'img/news/basic_photo/medium/'.$random_name.'';
                $medium = Image::make($upload_success)->resize(600, 398);
                $medium->save($medium_dir );

                //Large
                $large_dir = 'img/news/basic_photo/large/'.$random_name.'';
                $large = Image::make($upload_success)->resize(1600, 972);
                $large->save($large_dir);

                $image = new NewsBasicPhoto;
                $image->news_id = $last_news->id;
                $image->original_size = 'img/news/basic_photo/'.$random_name.'';
                $image->small = $small_dir;
                $image->thumbnail = $thumbnail_dir;
                $image->medium = $medium_dir;
                $image->large= $large_dir;
                $image->save();
        }
        
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/news');
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
        $news_id = $tokens[3];
        $avail_news = News::where('id', '=', $news_id)->get();
        $user_id = Auth::user()->id;
        foreach ($avail_news as $key => $value) {
            if ($user_id != $value->user_id && $user_id != 1){
                return redirect('admin/news');
            }
        }
        $sections = Section::all();
        $news = News::with('sections')->with('tags')->with('palbums')->with('valbums')->with('features')->with('basic_photo')->find($news_id);
        $palbums_photo = News_photo_album_photos::all();
        $valbums_video = News_video_album_videos::all();
        $tags = News_tags::groupBy('tags')->get();
        return view('backend.news.edit_news', compact('news', 'sections', 'palbums_photo', 'valbums_video', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNewsRequest $request, $id)
    {
        $mynewid = $id;
        $news = News::find($id);
        $news->title = $request->input('title');
        $custom_url = $request->input('title');
        $path = str_replace(' ', '-', $custom_url);
        $path = str_replace('/', '-', $custom_url);
        $page_path_db = News::all(['link']);
        foreach ($page_path_db as $key => $value) {
            $slug = $value->path;        
            if ($path == $slug){
                $last_char = substr($slug, -1);
                if (is_numeric($last_char)){
                    $created_char = $last_char + 1;
                    $path = substr($path, 0, -1);
                    $path = $path . '' . $created_char;
                }
                else{
                    $created_char = 1;
                    $path = $path . '' . $created_char;
                }                
            }
        }
        $news->link = $path;
        $news->summary = $request->input('summary');
        $news->subject = $request->input('news_subject');
        $news->status = $request->status;
        $news->comments_status = $request->comments;
        $news->author = $request->author;
        if ($request->input('publish') == 'checked'){
            $news->publish_facebook = 1;       
        }
        else{
            $news->publish_facebook = 2;
        }
        $user_id = Auth::user()->id;
        $news->user_id = $user_id;
        $news->advantage = $request->input('advantage');
        $news->update();

        $my_items = News_features::where('news_id', '=', $mynewid)->get();
        foreach ($my_items as $key => $value) {
            $feature_id = $value->id;
            $delete_feature = News_features::find($feature_id);
            $delete_feature->delete();
        }
        for ($i=1; $i < 7; $i++) {             
                $news_features = new News_features;
                $news_features->feature = $i; 
                $news_features->news_id = $mynewid;
                     
            if ($request->input($i) == 'checked'){
                $news_features->status = 1;
            }
            else{
                $news_features->status = 2;
            }
            $news_features->save();
        }
        $sections = Section::all();
        News_sections::where('news_id', '=', $mynewid)->delete();
        foreach ($sections as $key => $value) {
            $section_id = $value->id;
            $news_sections = new News_sections;
            $news_sections->section = $section_id; 
            $news_sections->news_id = $mynewid; 
            if ($request->input($section_id) == 'checked'){
                $news_sections->status = 1;
            }
            else{
                $news_sections->status = 2;   
            }
            $news_sections->save(); 
        }

        $news_palbum = News_photo_album::where('news_id', '=', $mynewid)->first();
        if (empty($news_palbum)){
            $news_palbum = new News_photo_album;
            $news_palbum->news_id = $mynewid;
        }
        if (!empty($news_palbum)) {
            $news_palbum_id = $news_palbum['attributes']['id'];
        }
        $news_palbum->name = $request->pablum_name;
        $news_palbum->photographer = $request->pablum_photographer;
        $news_palbum->summary = $request->pablum_summary;
        $news_palbum->subject = $request->pablum_subject;
        if ($request->input('palbum_publish_on_home') == 'checked'){
            $news_palbum->publish_on_home = 1;       
        }
        else{
            $news_palbum->publish_on_home = 2;
        }
        if (empty($news_palbum)){
            $news_palbum->save();
            $news_palbum = News_photo_album::orderBy('id', 'desc')->first();
            $last_news_palbum_id = $news_palbum->id;
        }
        else{
            $news_palbum->update();
        }
        $destroy_images = $request->destroy_images;
        if (!empty($destroy_images)){
            $explode = explode('-', $destroy_images);
            foreach ($explode as $key => $value) {
                if (!empty($value)){
                    News_photo_album_photos::find($value)->delete();
                }
            }
        }
        $files = $request->file('files');
        if (!empty($files)){
        foreach($files as $file) {
            if (empty($file)){
                break;
            }
            $rules = array(
               'image' => 'mimes:png,gif,jpeg,jpg|max:1000'
           );
           $validator = \Validator::make(array('image'=> $file), $rules);
           if($validator->passes()){
                $destinationPath = 'img/news/palbum';
                $filename = $file->getClientOriginalName();
                  $mime_type = $file->getMimeType();
                  $extension = $file->getClientOriginalExtension();
                  $random_name = str_random(14).'.'.$extension;
                $upload_success = $file->move($destinationPath, $random_name );
                //small
                $small_dir = 'img/news/palbum/small/'.$random_name.'';
                $small= Image::make($upload_success)->resize(76, 76);
                $small->save($small_dir);

                //thumbnail
                $thumbnail_dir = 'img/news/palbum/thumbinal/'.$random_name.'';
                $thumb = Image::make($upload_success)->resize(300, 132);
                $thumb->save($thumbnail_dir);

                //meduim
                $medium_dir = 'img/news/palbum/medium/'.$random_name.'';
                $medium = Image::make($upload_success)->resize(600, 398);
                $medium->save($medium_dir );

                //Large
                $large_dir = 'img/news/palbum/large/'.$random_name.'';
                $large = Image::make($upload_success)->resize(1600, 972);
                $large->save($large_dir);

                $image = new News_photo_album_photos;
                if (empty($news_palbum_id)) {
                    $news_palbum_id = $last_news_palbum_id;
                }
                $image->news_photo_album_id = $news_palbum_id;
                $image->original_size = 'img/news/palbum/'.$random_name.'';
                $image->small = $small_dir;
                $image->thumbnail = $thumbnail_dir;
                $image->medium = $medium_dir;
                $image->large= $large_dir;
                $image->save();
            }
            else
            {
                $errors = $validator->errors()->all();
                return redirect()->back()->withErrors($errors)->withInput();
            }
        }
        }

        $news_valbum = News_video_album::where('news_id', '=', $mynewid)->first();
        if (empty($news_valbum)){
            $news_valbum = new News_video_album;
            $news_valbum->news_id = $mynewid;
        }
        if (count($news_valbum) > 0){
            $news_valbum_id = $news_valbum['attributes']['id'];
        }
            
            $news_valbum->name = $request->vablum_name;
            $news_valbum->photographer = $request->vablum_photographer;
            $news_valbum->summary = $request->vablum_summary;
            $news_valbum->subject = $request->vablum_subject;
            if ($request->input('valbum_publish_on_home') == 'checked'){
                $news_valbum->publish_on_home = 1;       
            }
            else{
                $news_valbum->publish_on_home = 2;
            }
            if (!empty($news_valbum)){
                $news_valbum->update();            
            }
            else{
                $news_valbum->save();
                $valbum = News_video_album::orderBy('id', 'desc')->first();
                $last_valbum_id = $valbum['attributes']['id'];
            }
            
            if (!empty($news_valbum_id)){
                News_video_album_videos::where('news_video_album_id', '=', $news_valbum_id)->delete();
            }     
            $count = $request->input('counter');
            for ($i=1; $i <= $count; $i++) {
                $videos = new News_video_album_videos; 
                $input_name = "vablum_videos_" . $i;
                $videos->video = $request->input($input_name);
                if (empty($news_valbum_id)){
                    $news_valbum_id = $last_valbum_id;
                }
                $videos->News_video_album_id = $news_valbum_id;
                if (!empty($request->input($input_name))){
                    $videos->save();
                }
            }
        
        News_tags::where('news_id', '=', $mynewid)->delete();

        $mytags = $request->input('auto_tags');
        if (!empty($mytags)){
            foreach ($mytags as $key => $value) {
                $save_tags = new News_tags;
                $save_tags->news_id = $mynewid;
                $save_tags->tags = $value;
                $save_tags->save();
            }
        }

        $newtags = $request->input('new_tag');
        if (!empty($newtags)){
            $explode = explode('#', $newtags);
            foreach ($explode as $key => $value) {
                if (!empty($value)){
                    $save_newtags = new News_tags;
                    $save_newtags->news_id = $mynewid;
                    $save_newtags->tags = $value;
                    $save_newtags->save();
                }
            }
        }

        
        $file = $request->file('basic_photo');
        if (!empty($file)){
            if (empty($file)){
                break;
            }
            NewsBasicPhoto::where('news_id', '=', $mynewid)->delete();
            $rules = array(
               'image' => 'mimes:png,gif,jpeg,jpg|max:1000'
           );
           $validator = \Validator::make(array('image'=> $file), $rules);
           if($validator->passes()){
                $destinationPath = 'img/news/basic_photo';
                $filename = $file->getClientOriginalName();
                  $mime_type = $file->getMimeType();
                  $extension = $file->getClientOriginalExtension();
                  $random_name = str_random(14).'.'.$extension;
                $upload_success = $file->move($destinationPath, $random_name );
                //small
                $small_dir = 'img/news/basic_photo/small/'.$random_name.'';
                $small= Image::make($upload_success)->resize(76, 76);
                $small->save($small_dir);

                //thumbnail
                $thumbnail_dir = 'img/news/basic_photo/thumbinal/'.$random_name.'';
                $thumb = Image::make($upload_success)->resize(300, 132);
                $thumb->save($thumbnail_dir);

                //meduim
                $medium_dir = 'img/news/basic_photo/medium/'.$random_name.'';
                $medium = Image::make($upload_success)->resize(600, 398);
                $medium->save($medium_dir );

                //Large
                $large_dir = 'img/news/basic_photo/large/'.$random_name.'';
                $large = Image::make($upload_success)->resize(1600, 972);
                $large->save($large_dir);

                $image = new NewsBasicPhoto;
                $image->news_id = $mynewid;
                $image->original_size = 'img/news/basic_photo/'.$random_name.'';
                $image->small = $small_dir;
                $image->thumbnail = $thumbnail_dir;
                $image->medium = $medium_dir;
                $image->large= $large_dir;
                $image->save();
            }
        }
        
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/news/' .$mynewid . '/edit');
    }



     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('backend.news.delete_news', compact('news'));
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
        $news = $tokens[4];
        $explode = explode('-', $news);
        $arr = array();
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                array_push($arr, $value);
            }
        }
        $news = News::whereIn('id', $arr)->get();
        return view('backend.news.delete_all_news', compact('news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/news');
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
        $news = $tokens[4];
        $explode = explode('-', $news);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $mynews = News::find($value);
                $mynews->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/news');
    }

}
