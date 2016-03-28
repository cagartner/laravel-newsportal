@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 1)


			@extends('backend.master')
@section('content-header')
<!-- Main content -->
<h1>لوحة التحكم</h1>
<ol class="breadcrumb">
    <li>
        <a href="/admin/dashboard">
            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
            الرئيسية
        </a>
    </li>
    <li class="active" style="margin-top: -3px;">
        لوحة التحكم
    </li>
</ol>
@endsection
@section('content')

<div class="row">
                    <a href="/admin/sections">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 nopadmar" style="float:right;">
                                    <div class="row">
                                        <div class="square_box col-xs-7"  style="float:right;">
                                            <span>الاقسام</span><br>
                                            <div style="font-size: 30px;"> {{ $sections->count()}}</div>
                                        </div>
                                        <i class="livicon" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">الاقسام المفعلة</small>
                                            <h4 id="myTargetElement1.1">
                                                {{$sections_act->count()}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">الاقسام الغير المفعلة</small>
                                            <h4 id="myTargetElement1.2">
                                                {{$sections->count() - $sections_act->count()}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="/admin/news">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 nopadmar" style="float:right;">
                                    <div class="row">
                                        <div class="square_box col-xs-7" style="float:right;">
                                            <span>الاخبار</span><br>
                                            <div style="font-size: 30px;">{{$news->count()}}</div>
                                        </div>
                                        <i class="livicon" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">الاخبار غبر المفعلة</small>
                                            <h4 id="myTargetElement1.1">
                                                {{$news->count()  - $news_act->count()}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">الاخبار المفعلة</small>
                                            <h4 id="myTargetElement1.2">
                                                {{$news_act->count()}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="/admin/advertisements">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 nopadmar" style="float:right;">
                                    <div class="row">
                                        <div class="square_box col-xs-7" style="float:right;">
                                            <span>الاعلانات</span><br>
                                            <div style="font-size: 30px;">{{$advs->count()}}</div>
                                        </div>
                                        <i class="livicon" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">الاعلانات المفعلة</small>
                                            <h4 id="myTargetElement3.1">
                                            {{$advs_act->count()}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <small class="stat-label">الاعلانات الغير المفعلة</small>
                                            <h4 id="myTargetElement3.1">
                                            {{$advs->count() - $advs_act->count()}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="/admin/groups">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 nopadmar" style="float:right;">
                                    <div class="row">
                                        <div class="square_box col-xs-7" style="float:right;">
                                            <span>عدد المجموعات</span><br>
                                            <div style="font-size: 30px;">{{$groups->count()}}</div>
                                        </div>
                                        <i class="livicon" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">المجموعات المفعلة</small>
                                            <h4 id="myTargetElement1.1">
                                                {{$groups->count()}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">المجموعات الغير المفعلة</small>
                                            <h4 id="myTargetElement1.2">
                                                {{$groups->count() - $groups->count()}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
        </div>

        <div class="row">
                    <a href="/admin/admins">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="lightbluebg no-radius" style="background-color:#526E86;">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 nopadmar" style="float:right;">
                                    <div class="row">
                                        <div class="square_box col-xs-7"  style="float:right;">
                                            <span>الاعضاء</span><br>
                                            <div style="font-size: 30px;"> {{ $users}}</div>
                                        </div>
                                        <i class="livicon" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">الاعضاء المفعلة</small>
                                            <h4 id="myTargetElement1.1">
                                                {{$users_act}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">الاعضاء الغير المفعلة</small>
                                            <h4 id="myTargetElement1.2">
                                                {{$users - $users_act}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="redbg no-radius"  style="background:#9F4947;">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 nopadmar" style="float:right;">
                                    <div class="row">
                                        <div class="square_box col-xs-7" style="float:right;">
                                            <span>الرسائل</span><br>
                                            <div style="font-size: 30px;">{{$messages}}</div>
                                        </div>
                                        <i class="livicon" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">عدد الرسائل اليومية</small>
                                            <h4 id="myTargetElement1.1">
                                                {{$messages  - $old_messages}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">عدد الرسائل السابقة</small>
                                            <h4 id="myTargetElement1.2">
                                                {{$old_messages}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/opinions">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="goldbg no-radius" style="background:#B6843E;">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 nopadmar" style="float:right;">
                                    <div class="row">
                                        <div class="square_box col-xs-7" style="float:right;">
                                            <span>استطلاعات الرأي</span><br>
                                            <div style="font-size: 30px;">{{$opinion}}</div>
                                        </div>
                                        <i class="livicon" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">مجموع التصويت</small>
                                            <h4 id="myTargetElement3.1">
                                            @foreach ($total_options as $votes)
                                                {{$votes->votes}}
                                            @endforeach
                                            </h4>
                                        </div>
                                        <div class="col-xs-6">
                                        <small class="stat-label">مجموع الخيارات للجميع</small>
                                            <h4 id="myTargetElement3.1">
                                        @foreach ($total_options as $votes)
                                                {{$votes->options}}
                                            @endforeach
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <a href="/admin/pages">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="palebluecolorbg no-radius" style="background:#3E9680;">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 nopadmar" style="float:right;">
                                    <div class="row">
                                        <div class="square_box col-xs-7" style="float:right;">
                                            <span>عدد الصفحات</span><br>
                                            <div style="font-size: 30px;">{{$pages}}</div>
                                        </div>
                                        <i class="livicon" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">الصفحات المفعلة</small>
                                            <h4 id="myTargetElement1.1">
                                                {{$pages}}
                                            </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">الصفحات الغير المفعلة</small>
                                            <h4 id="myTargetElement1.2">
                                                0
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
        </div>

        <div class="row">
        <div class="col-md-12">
                        <div class="panel panel-primary todolist">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white" data-l="true"></i>
                                    الاخبار الاكثر زيارة
                                </h4>
                            </div>
                            <div class="panel-body nopadmar">
                            <div class="todolist_list showactions">
                                        <div class="col-md-8" style="padding-right:10px;">
                                            <div class="todotext todoitem">الاخبار الاكثر زيارة</div>
                                        </div>
                                        <div class="col-md-4" style="padding-right:10px;">
                                            <div class="todotext todoitem">الاقسام التابع لها الخبر</div>
                                        </div>
                             </div>
                            @foreach ($news_most_views as $item)
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8" style="padding-right:10px;">
                                            <a href="/admin/news/{{$item->id}}/edit"><div class="todotext todoitem">{{$item->title}}</div></a>
                                        </div>
                                        <div class="col-md-4" style="padding-right:10px;">
                                        @foreach ($item->sections as $mysection)
                                            @foreach($sections as $sec)
                                                @if ($sec->id == $mysection->section)
                                                    @if ($mysection->status == 1)
                                                        <a href="/admin/sections/{{$sec->id}}/edit"><div class="todotext todoitem"> - {{$sec->name}} </div></a> 
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                        </div>
                                    </div>
                            @endforeach
                            
                            </div>
                        </div>
                    </div>
        </div>

        <div class="row">
        <div class="col-md-12">
                        <div class="panel panel-primary todolist">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white" data-l="true"></i>
                                    الاقسام
                                </h4>
                            </div>
                            <div class="panel-body nopadmar">
                            <div class="todolist_list showactions">
                                        <div class="col-md-8" style="padding-right:10px;">
                                            <div class="todotext todoitem">الاقسام</div>
                                        </div>
                                        <div class="col-md-4" style="padding-right:10px;">
                                            <div class="todotext todoitem">عدد الاخبار الخبر</div>
                                        </div>
                             </div>
                            @foreach ($sections as $item)
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8" style="padding-right:10px;">
                                            <a href="/admin/sections/{{$item->id}}/edit"><div class="todotext todoitem">{{$item->name}}</div></a>
                                        </div>
                                        <div class="col-md-4" style="padding-right:10px;">
                                        
                                        
                                            
                                                @foreach ($count_news as $mynews_sec)
                                                @if ($item->id == $mynews_sec->section)
                                                
                                                        <a href="#"><div class="todotext todoitem"> {{$mynews_sec->count_sec_news}} </div></a> 
                                                @endif
                                                
                                            @endforeach
                                            
                                        
                                        </div>
                                    </div>
                            @endforeach
                            
                            </div>
                        </div>
                        <div> <i class="fa fa-folder-o"></i>إجمالي : {{ $sections->count() }} قسم</div>
                    </div>
        </div>

@endsection
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/backend/css/only_dashboard.css') }}" />
<style type="text/css">
    .todoitem {
        float: right !important;
    }
</style>
@endsection
@stop

        @else
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif    




