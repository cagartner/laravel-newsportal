<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::where('activation', '=', 1)->get();
        $news_load = News::with('basic_photo')->with('sections')->with('features')->with('valbums')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $valbums_videos = News_video_album_videos::all();
        $last_news = News::with('sections')->with('basic_photo')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $news_related_sections = DB::select('select * from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND news.status = 1 ORDER BY news.created_at DESC');
        $images = News_photo_album_photos::orderBy('created_at', 'desc')->take(10)->get();
        $videos = News_video_album_videos::orderBy('created_at', 'desc')->first();
        $news_most_imp = DB::select('select * from news LEFT JOIN news_features as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND mysec.feature = 4 AND news.status = 1 ORDER BY news.created_at DESC LIMIT 10');
        $news_most_views = News::with('basic_photo')->orderBy('views', 'DESC')->take(10)->get();
        $today = date('Y-m-d');
        $adv = Advertisement::with('images')->where('end', '>', $today)->get();
        if (!empty($_GET['date'])){
            $choosed_date = $_GET['date'] . ' 00:00:00';
            $choosed_date_plus_day = $_GET['date'] . ' 23.59.59';
            $news_search = News::with('basic_photo')->whereBetween('created_at', array($choosed_date, $choosed_date_plus_day))->paginate(10);
            $news_search_count = News::with('basic_photo')->whereBetween('created_at', array($choosed_date, $choosed_date_plus_day))->get();
            return view('frontend.search-result-found', compact('news_search_count', 'news_search', 'adv', 'images', 'news_most_imp' ,'news_most_views', 'videos', 'news_load', 'last_news', 'sections', 'valbums_videos', 'news_related_sections'));
        }
        else{
            return view('frontend.home_test', compact('adv', 'images', 'news_most_imp' ,'news_most_views', 'videos', 'news_load', 'last_news', 'sections', 'valbums_videos', 'news_related_sections'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function section_view($path){
        $sections = Section::where('activation', '=', 1)->get();
        $news_load = News::with('basic_photo')->with('sections')->with('features')->with('valbums')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $valbums_videos = News_video_album_videos::all();
        $last_news = News::with('sections')->with('basic_photo')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $news_related_sections = DB::select('select * from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND news.status = 1 ORDER BY news.created_at DESC');
        $images = News_photo_album_photos::orderBy('created_at', 'desc')->take(10)->get();
        $videos = News_video_album_videos::orderBy('created_at', 'desc')->first();
        $news_most_imp = DB::select('select * from news LEFT JOIN news_features as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND mysec.feature = 4 AND news.status = 1 ORDER BY news.created_at DESC LIMIT 10');
        $news_most_views = News::with('basic_photo')->orderBy('views', 'DESC')->take(10)->get();
        $today = date('Y-m-d');
        $adv = Advertisement::with('images')->where('end', '>', $today)->get();
        $path = str_replace('-', ' ', $path);
        $sections = Section::where('activation', '=', 1)->where('name', '=', $path)->first();
        $section_id = $sections['attributes']['id'];
        $news = DB::select('select * from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.section = '. $section_id.  ' AND mysec.status = 1 AND news.status = 1 ORDER BY news.created_at DESC');
        return view('frontend.sections.list_section', compact('news', 'sections', 'section_id', 'adv', 'images', 'news_most_imp' ,'news_most_views', 'videos', 'news_load', 'last_news', 'sections', 'valbums_videos', 'news_related_sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news($date, $path){
        $sections = Section::where('activation', '=', 1)->get();
        $news_load = News::with('basic_photo')->with('sections')->with('features')->with('valbums')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $valbums_videos = News_video_album_videos::all();
        $last_news = News::with('sections')->with('basic_photo')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $news_related_sections = DB::select('select * from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND news.status = 1 ORDER BY news.created_at DESC');
        $images = News_photo_album_photos::orderBy('created_at', 'desc')->take(10)->get();
        $videos = News_video_album_videos::orderBy('created_at', 'desc')->first();
        $news_most_imp = DB::select('select * from news LEFT JOIN news_features as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND mysec.feature = 4 AND news.status = 1 ORDER BY news.created_at DESC LIMIT 10');
        $news_most_views = News::with('basic_photo')->orderBy('views', 'DESC')->take(10)->get();
        $today = date('Y-m-d');
        $adv = Advertisement::with('images')->where('end', '>', $today)->get();
        $news = News::with('palbums')->with('valbums')->with('tags')->with('sections')->with('basic_photo')->where('status', '=', 1)->where('link', '=', $path)->orderBy('id', 'desc')->get();
        $news_views = News::where('link', '=', $path)->first();
        $news_views->views = $news_views->views + 1;
        $news_views->update();

        $palbum_id = $news[0]['palbums'][0]['attributes']['id'];
        $palbum_images = News_photo_album_photos::where('news_photo_album_id', '=', $palbum_id)->get();
        $valbum_id = $news[0]['valbums'][0]['attributes']['id'];
        $valbum_videos = News_video_album_videos::where('news_video_album_id', '=', $valbum_id)->get();


        return view('frontend.sections.section-topic-details', compact('palbum_images', 'valbum_videos', 'news', 'adv', 'images', 'news_most_imp' ,'news_most_views', 'videos', 'news_load', 'last_news', 'sections', 'valbums_videos', 'news_related_sections'));
    }

    /**
     * Render Dashboard Form.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        $sections_act = Section::where('activation', '=', 1)->get();
        $news = News::all();
        $news_act = News::where('status', '=', 1)->get();
        $advs = Advertisement::all();
        $advs_act = Advertisement::where('status', '=', 1)->get();
        $groups = Group::all();
        $users = User::count();
        $users_act = User::where('confirmed', '=', 1)->count();
        $yesterday = date('Y/m/d', strtotime("-1 days"));
        $messages = ContactUs::count();
        $old_messages = ContactUs::where('created_at', '<', $yesterday)->count();
        $opinion = Opinion::count();
        $total_options = DB::select('select count(counter) as options, sum(votes) as votes from opinion_options');
        $pages = Page::count();
        $news_most_views = News::with('sections')->orderBy('views', 'DESC')->take(15)->get();
        $count_news = DB::select('select mysec.section, count(news.id) as count_sec_news from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) where mysec.status = 1 GROUP BY mysec.section');
        return view('backend.dashboard', compact('total_options', 'count_news', 'news_most_views', 'pages', 'opinion', 'yesterday', 'messages', 'old_messages', 'users', 'users_act', 'sections', 'news', 'sections_act', 'news_act', 'advs', 'advs_act', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_page($path){
        $sections = Section::where('activation', '=', 1)->get();
        $news_load = News::with('basic_photo')->with('sections')->with('features')->with('valbums')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $valbums_videos = News_video_album_videos::all();
        $last_news = News::with('sections')->with('basic_photo')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $news_related_sections = DB::select('select * from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND news.status = 1 ORDER BY news.created_at DESC');
        $images = News_photo_album_photos::orderBy('created_at', 'desc')->take(10)->get();
        $videos = News_video_album_videos::orderBy('created_at', 'desc')->first();
        $news_most_imp = DB::select('select * from news LEFT JOIN news_features as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND mysec.feature = 4 AND news.status = 1 ORDER BY news.created_at DESC LIMIT 10');
        $news_most_views = News::with('basic_photo')->orderBy('views', 'DESC')->take(10)->get();
        $today = date('Y-m-d');
        $adv = Advertisement::with('images')->where('end', '>', $today)->get();
        $opinions = Opinion::with('options')->paginate(20);
        $page = Page::where('path', '=', $path)->first();
        return view('frontend.pages.pages', compact('page', 'adv', 'images', 'news_most_imp' ,'news_most_views', 'videos', 'news_load', 'last_news', 'sections', 'valbums_videos', 'news_related_sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_opinion(){
        $sections = Section::where('activation', '=', 1)->get();
        $news_load = News::with('basic_photo')->with('sections')->with('features')->with('valbums')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $valbums_videos = News_video_album_videos::all();
        $last_news = News::with('sections')->with('basic_photo')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $news_related_sections = DB::select('select * from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND news.status = 1 ORDER BY news.created_at DESC');
        $images = News_photo_album_photos::orderBy('created_at', 'desc')->take(10)->get();
        $videos = News_video_album_videos::orderBy('created_at', 'desc')->first();
        $news_most_imp = DB::select('select * from news LEFT JOIN news_features as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND mysec.feature = 4 AND news.status = 1 ORDER BY news.created_at DESC LIMIT 10');
        $news_most_views = News::with('basic_photo')->orderBy('views', 'DESC')->take(10)->get();
        $today = date('Y-m-d');
        $adv = Advertisement::with('images')->where('end', '>', $today)->get();
        $opinions = Opinion::with('options')->paginate(20);
        return view('frontend.opinion.opinions', compact('opinions', 'adv', 'images', 'news_most_imp' ,'news_most_views', 'videos', 'news_load', 'last_news', 'sections', 'valbums_videos', 'news_related_sections'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post_opinion(){
        if (isset($_POST['submit'])) {
            if(isset($_POST['radio']))
            {
                $option_id = $_POST['radio'];
                $options = OpinionOptions::find($option_id);
                $options->votes = $options->votes + 1;
                $options->update();
            }
            return redirect('opinions');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getsettings()
    {
        $settings = Settings::first();
        return $settings;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getsocial()
    {
        $social = SocialMedia::all();
        return $social;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getadvs()
    {
        $today = date('Y-m-d');
        $adv = Advertisement::with('images')->where('end', '>', $today)->get();
        return $adv;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gettags()
    {
        $tags = News_tags::groupBy('tags')->take(20)->get();
        return $tags;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_tags($path){
        $path = str_replace('-', ' ', $path);
        $path = "$path";
        $news_tags = DB::select("select * from news LEFT JOIN news_tags as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where news.status = 1 AND mysec.tags = '{$path}' ORDER BY news.created_at DESC");
        $sections = Section::where('activation', '=', 1)->get();
        $news_load = News::with('basic_photo')->with('sections')->with('features')->with('valbums')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $valbums_videos = News_video_album_videos::all();
        $last_news = News::with('sections')->with('basic_photo')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $news_related_sections = DB::select('select * from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND news.status = 1 ORDER BY news.created_at DESC');
        $images = News_photo_album_photos::orderBy('created_at', 'desc')->take(10)->get();
        $videos = News_video_album_videos::orderBy('created_at', 'desc')->first();
        $news_most_imp = DB::select('select * from news LEFT JOIN news_features as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND mysec.feature = 4 AND news.status = 1 ORDER BY news.created_at DESC LIMIT 10');
        $news_most_views = News::with('basic_photo')->orderBy('views', 'DESC')->take(10)->get();
        $today = date('Y-m-d');
        $adv = Advertisement::with('images')->where('end', '>', $today)->get();
        $opinions = Opinion::with('options')->paginate(20);
        $page = Page::where('path', '=', $path)->first();
        return view('frontend.tags.mytags', compact('news_tags', 'page', 'adv', 'images', 'news_most_imp' ,'news_most_views', 'videos', 'news_load', 'last_news', 'sections', 'valbums_videos', 'news_related_sections'));   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_news_features($path){
        $path = str_replace('-', ' ', $path);
        $path = "$path";
        if ($path == "عاجل"){
            $feature_id = 2;
        }
        else{
            $feature_id = 1;
        }
        $get_news_features = DB::select("select * from news LEFT JOIN news_features as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND mysec.feature = $feature_id AND news.status = 1 ORDER BY news.created_at DESC");
        $sections = Section::where('activation', '=', 1)->get();
        $news_load = News::with('basic_photo')->with('sections')->with('features')->with('valbums')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $valbums_videos = News_video_album_videos::all();
        $last_news = News::with('sections')->with('basic_photo')->where('status', '=', 1)->orderBy('id', 'desc')->take(20)->get();
        $news_related_sections = DB::select('select * from news LEFT JOIN news_sections as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND news.status = 1 ORDER BY news.created_at DESC');
        $images = News_photo_album_photos::orderBy('created_at', 'desc')->take(10)->get();
        $videos = News_video_album_videos::orderBy('created_at', 'desc')->first();
        $news_most_imp = DB::select('select * from news LEFT JOIN news_features as mysec ON (mysec.news_id = news.id) LEFT JOIN news_basic_photos as myimage ON (myimage.news_id = news.id) where mysec.status = 1 AND mysec.feature = 4 AND news.status = 1 ORDER BY news.created_at DESC LIMIT 10');
        $news_most_views = News::with('basic_photo')->orderBy('views', 'DESC')->take(10)->get();
        $today = date('Y-m-d');
        $adv = Advertisement::with('images')->where('end', '>', $today)->get();
        $opinions = Opinion::with('options')->paginate(20);
        $page = Page::where('path', '=', $path)->first();
        return view('frontend.features.myfeatures', compact('path', 'get_news_features', 'page', 'adv', 'images', 'news_most_imp' ,'news_most_views', 'videos', 'news_load', 'last_news', 'sections', 'valbums_videos', 'news_related_sections'));   
    }

    /**
     * Display a listing of the menu links.
     *
     * @return Response
     */
    public function main_menu_links()
    {
        $main_menu =  Menu::where('id', '=', '1')->get();
        return $main_menu;
    }
}
