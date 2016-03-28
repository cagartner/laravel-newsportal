@inject('settings', 'App\Http\Controllers\HomeController')
@inject('advs', 'App\Http\Controllers\HomeController')
@inject('frontend', 'App\Http\Controllers\HomeController')
  <div class="header-toolbar">
    <div class="container">
      <div class="row">
        <div class="col-md-16 text-uppercase">
          <div class="row">
            <div class="col-sm-8 col-xs-16">
                <ul id="inline-popups" class="list-inline">
                  <li class="hidden-xs"><a href="/page/من-نحن">من نحن</a></li>
                  <li class="hidden-xs"><a href="/opinions">استطلاع الرأي</a></li>
                  <li class="hidden-xs"><a href="/contact">اتصل بنا</a></li>
                </ul>
            </div>
            <div class="col-xs-16 col-sm-8">
              <div class="row">
                <div id="weather" class="col-xs-16 col-sm-8 col-lg-9"></div>
                <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header toolbar end --> 
   <!-- sticky header start -->
  <div class="sticky-header"> 
    <!-- header start -->
    <div class="container header">
      <div class="row">
        <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="/home"><img src="/{{$settings->getsettings()->logo}}" width="468" height="60" alt=""/></a></div>
        <div class="col-sm-11 col-md-11 hidden-xs text-left">
          @if ($advs->getadvs()->count())
            @foreach ($advs->getadvs() as $view)
              @if ($view->position == 3)
                @foreach ($view->images as $myimage)
                  <img src="/{{$myimage->small}}" width="468" height="60" alt=""/></div>
                  <!--wide ad end--> 
                @endforeach
              @endif
            @endforeach
          @endif
      </div>
    </div></div>
    <!-- header end --> 
    <!-- nav and search start -->
    <div class="nav-search-outer"> 
      <!-- nav start -->
      
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
          <div class="row">
            <div class="col-sm-16"><!-- <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>-->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav text-uppercase main-nav ">
                @foreach($frontend->main_menu_links() as $menu)
                  @foreach($menu->links as $link)
                  @if ($link->order < $menu->no_links)
                    @if($link->parent == '0')
                  <li @if(Request::is($link->link)) class="active" @endif><a href="{{ $link->link }}">{{ $link->title }}@if($link->has_children == '1')<span class="ion-ios7-arrow-down nav-icn"></span>@endif</a></li>
                  {{--level 1--}}
                  @if($link->has_children == '1')
                    <ul class="dropdown-menu text-capitalize" role="menu">
                      @foreach($menu->childrens as $link_1)
                      @if($link_1->parent == $link->id)
                      <li @if(Request::is($link_1->link)) class="active" @endif>
                          <a href="{{ $link_1->link }}">{{$link_1->title }} @if($link_1->has_children == '1')<span class="ion-ios7-arrow-down nav-icn"></span>@endif</a></li>

                           {{--level 1--}}
                    @if($link_1->has_children == '1')
                    <ul class="dropdown-menu text-capitalize" role="menu">
                        @foreach($menu->childrens as $link_2)
                        @if($link_2->parent == $link_1->id)
                        <li @if(Request::is($link_2->link)) class="active" @endif>
                            <a href="{{ $link_2->link }}">{{$link_2->title }} @if($link_2->has_children == '1')<span class="ion-ios7-arrow-down nav-icn"></span>@endif</a>
                            @if($link_2->has_children == '1')
                            <ul class="dropdown-menu text-capitalize" role="menu">
                                @foreach($menu->childrens as $link_3)
                                @if($link_3->parent == $link_2->id)
                                <li @if(Request::is($link_3->link)) class="active" @endif>
                                    <a href="{{ $link_3->link }}">{{$link_3->title }} @if($link_3->has_children == '1')<span class="ion-ios7-arrow-down nav-icn"></span>@endif</a>
                                        @if($link_3->has_children == '1')
                                        <ul class="dropdown-menu text-capitalize" role="menu">
                                            @foreach($menu->childrens as $link_4)
                                            @if($link_4->parent == $link_3->id)
                                            <li @if(Request::is($link_4->link)) class="active" @endif>
                                                <a href="{{ $link_4->link }}">{{$link_4->title }}</a>
                                            </li>

                                              @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endif
                @endforeach
            </ul>
            @endif
        </li>
        @endif
        @endif
      @endforeach
    @endforeach

@foreach($frontend->main_menu_links() as $menu)
                  @foreach($menu->links as $link)
                  @if ($link->order >= $menu->no_links)
<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">المزيد<span class="ion-ios7-arrow-down nav-icn"></span></a>
@endif
@endforeach
@endforeach
<ul class="dropdown-menu text-capitalize" role="menu">
@foreach($frontend->main_menu_links() as $menu)
                  @foreach($menu->links as $link)
                  @if ($link->order >= $menu->no_links)
<li @if(Request::is($link->link)) class="active" @endif><a href="{{ $link->link }}">{{ $link->title }}@if($link->has_children == '1') <span class="ion-ios7-arrow-right nav-sub-icn"></span>@endif</a></li>
@endif
@endforeach
@endforeach
</ul>
</li>

</ul>

            </div>
          </div>
        </div>
        <!-- nav end --> 
        <!-- search start -->
        <!--
        <div class="search-container ">
          <div class="container">
            <form action="" method="" role="search">
              <input id="search-bar" placeholder="Type & Hit Enter.." autocomplete="off">
            </form>
          </div>
        </div>
        -->
        <!-- search end --> 
      </nav>
      <!--nav end--> 
    </div>
    <!-- nav and search end--> 
  </div>