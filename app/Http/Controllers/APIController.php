<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as MyRequest;
use Illuminate\Support\Facades\Request as Request;
use App\Http\Requests;
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

use App\Advertisement;
use App\AdvertisementImages;
use App\Group;
use App\User;
use App\ContactUs;
use App\Opinion;
use App\OpinionOptions;
use App\Page;
use App\Settings;
use App\SocialMedia;
use App\Menu;
use App\MenuLink;
use App\Http\Requests\Request as RequestsRequest;
use DB;
use Response;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sections()
    {

        $Auth = 'INNO_news_2015';
        $get_auth = Request::get('auth');
        if($get_auth && $get_auth == $Auth) {
            $sections = Section::all();
            $result = array('status' => '1', 'respond' => $sections);
        }
        else
        {
             $result = array('status' => '0', 'respond' => 'Not Authorized');
             
        }
        return Response::json($result);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        $Auth = 'INNO_news_2015';
        $get_auth = Request::get('auth');
        if($get_auth && $get_auth == $Auth) {
            $news = news::with('tags')->with('features')->with('sections')->with('basic_photo')->get();
            //$news = DB::select('select DISTINCT * from news LEFT JOIN news_basic_photos ON(news.id = news_basic_photos.news_id) LEFT JOIN news_features ON(news.id = news_features.news_id) LEFT JOIN news_photo_album ON(news.id = news_photo_album.news_id) LEFT JOIN news_photo_album_photos ON(news_photo_album_photos.news_photo_album_id = news_photo_album.id) LEFT JOIN news_video_album ON(news.id = news_video_album.news_id) LEFT JOIN news_video_album_videos ON(news_video_album_videos.news_video_album_id = news_video_album.id) LEFT JOIN news_sections ON(news_sections.news_id = news.id) LEFT JOIN news_tags ON(news_tags.news_id = news.id)');
            $result = array('status' => '1', 'respond' => $news);
        }
        else
        {
             $result = array('status' => '0', 'respond' => 'Not Authorized');
             
        }
        return Response::json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function news_related_section()
    {
        $Auth = 'INNO_news_2015';
        $get_auth = Request::get('auth');
        $section_id = Request::get('section_id');
        if($get_auth && $get_auth == $Auth) {
            $news_related_sections = DB::select('select * from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND news.status = 1 AND mysec.section = ' . $section_id . ' ORDER BY news.created_at DESC');
            $result = array('status' => '1', 'respond' => $news_related_sections);
        }
        else
        {
             $result = array('status' => '0', 'respond' => 'Not Authorized');
             
        }
        return Response::json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singlenews()
    {
        
        $Auth = 'INNO_news_2015';
        $get_auth = Request::get('auth');
        $news_id = Request::get('id');
        if($get_auth && $get_auth == $Auth) {
            $news = news::with('tags')->with('palbums')->with('valbums')->with('features')->with('sections')->with('basic_photo')->where('id', '=', $news_id)->get();
            $palbum_id = $news[0]['palbums'][0]['attributes']['id'];
            $images = News_photo_album_photos::where('news_photo_album_id', '=', $palbum_id)->get();
            $valbum_id = $news[0]['valbums'][0]['attributes']['id'];
            $videos = News_video_album_videos::where('news_video_album_id', '=', $valbum_id)->get();
            $result = array('status' => '1', 'respond' => $news, 'palbum_images'=> $images, 'valbum_videos' => $videos);
        }
        else
        {
             $result = array('status' => '0', 'respond' => 'Not Authorized');
             
        }
        return Response::json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function groups()
    {
        $Auth = 'INNO_news_2015';
        $get_auth = Request::get('auth');
        if($get_auth && $get_auth == $Auth) {
            $groups = Group::all();
            $result = array('status' => '1', 'respond' => $groups);
        }
        else
        {
             $result = array('status' => '0', 'respond' => 'Not Authorized');
             
        }
        return Response::json($result);
    }

    /**
     * show the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $Auth = 'INNO_news_2015';
        $get_auth = Request::get('auth');
        if($get_auth && $get_auth == $Auth) {
            $users = User::all();
            $result = array('status' => '1', 'respond' => $users);
        }
        else
        {
             $result = array('status' => '0', 'respond' => 'Not Authorized');
             
        }
        return Response::json($result);
    }

    /**
     * show the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function users_related_group()
    {
        $Auth = 'INNO_news_2015';
        $get_auth = Request::get('auth');
        $group_id = Request::get('group_id');
        if($get_auth && $get_auth == $Auth) {
            $users = User::where('group_id', '=', $group_id)->get();
            $result = array('status' => '1', 'respond' => $users);
        }
        else
        {
             $result = array('status' => '0', 'respond' => 'Not Authorized');
             
        }
        return Response::json($result);
    }

    /**
     * show the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function news_most_visits()
    {
        $Auth = 'INNO_news_2015';
        $get_auth = Request::get('auth');
        if($get_auth && $get_auth == $Auth) {
            $news_most_views = News::with('basic_photo')->orderBy('views', 'DESC')->take(10)->get();
            $result = array('status' => '1', 'respond' => $news_most_views);
        }
        else
        {
             $result = array('status' => '0', 'respond' => 'Not Authorized');
             
        }
        return Response::json($result);
    }

    /**
     * show the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        $Auth = 'INNO_news_2015';
        $get_auth = Request::get('auth');
        if($get_auth && $get_auth == $Auth) {
            $settings = Settings::all();
            $result = array('status' => '1', 'respond' => $settings);
        }
        else
        {
             $result = array('status' => '0', 'respond' => 'Not Authorized');
             
        }
        return Response::json($result);
    }
}
