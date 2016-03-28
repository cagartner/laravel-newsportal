
<form action="" method="post">
<input type="radio" name="radio" value="Radio 1">Radio 1
<input type="radio" name="radio" value="Radio 2">Radio 2
<input type="radio" name="radio" value="Radio 3">Radio 3
<input type="submit" name="submit" value="Get Selected Values" />
</form>


<input type="radio" name="sex" value="male">Male<br>
<input type="radio" name="sex" value="female">Female

@extends('frontend.master')
@section('header-content')

<!-- bootstrap styles-->
<link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- google font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
<!-- ionicons font -->
<link href="{{ asset('assets/frontend/css/ionicons.min.css') }}" rel="stylesheet">
<!-- animation styles -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}" />
<!-- custom styles -->
<link href="{{ asset('assets/frontend/css/custom-red.css') }}" rel="stylesheet" id="style">
<!-- owl carousel styles-->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.transitions.css') }}">
<!-- magnific popup styles -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row"> 
      <!-- hot news start -->
      <div class="col-sm-16 hot-news hidden-xs">
        <div class="row">
          <div class="col-sm-15"> <span class="ion-ios7-timer icon-news pull-left"></span>
            <ul id="js-news" class="js-hidden">
            @if ($news_load->count())
            @foreach($news_load as $item)
            @foreach($item->features as $feature)
            @if ($feature->feature == 3 && $feature->status == 1)
              <li class="news-item"><a href="/story/{{$item->link}}">{{$item->title}}</a></li>
              <?php break; ?>
            @endif

            @endforeach
            @endforeach
            @endif
            </ul>
          </div>
          <div class="col-sm-1 shuffle text-right"><a href="#"><span class="ion-shuffle"></span></a></div>
        </div>
      </div>
      <!-- hot news end --> 
      <!-- banner outer start -->
      <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
        <div class="row">
          <div class="col-sm-16 col-md-10 col-lg-8"> 
            
            <!-- carousel start -->
            <div id="sync1" class="owl-carousel">
            @if ($last_news->count())
            @foreach($last_news as $view)
            @if ($view->advantage == 0)
              <div class="box item"> <a href="/story/{{$view->link}}">
                <div class="carousel-caption">{{$view->title}}</div>
                @foreach($view->basic_photo as $image)
                <img class="img-responsive" src="{{$image->large}}" width="1600" height="972" alt="{{$view->title}}"/>
                @endforeach
                <div class="overlay"></div>
                <div class="overlay-info">
                  <div class="cat">
                  @if ($view->sections->count())
                  @foreach($view->sections as $sec)
                  @if ($sections->count())
                    @foreach($sections as $section)
                    @if ($section->id == $sec->section && $sec->status == 1)
                    <a href="#"></a><p class="cat-data"><span class=""></span>{{$section->name}}</p>
                    @endif
                    @endforeach
                    @endif
                  @endforeach
                  @endif
                  </div>
                  <div class="info">
                    <p><span class="ion-android-data"></span>{{$view->created_at}}<span class="ion-chatbubbles"></span>{{$view->views}}</p>
                  </div>
                </div>
                </a></div>
                @endif
                @endforeach
                @endif
            </div>
            <div class="row">
              <div id="sync2" class="owl-carousel">
              @if ($last_news->count())
                @foreach($last_news as $view)
                @if ($view->advantage == 0)
                  @foreach($view->basic_photo as $image)
                    <div class="item"><img class=" img-responsive" src="{{$image->large}}"  width="1600" height="972" alt=""/></div>
                  @endforeach
                @endif
                @endforeach
              @endif
             </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-8 hidden-sm hidden-xs">
            <div class="row">
            @if ($news_load->count())
            <?php $i = 1; ?>
            @foreach($news_load as $item)
            @foreach($item->features as $feature)
            @if ($feature->feature == 4 && $feature->status == 1)
              <div class="col-lg-6 hidden-md"><a href="/story/{{$item->link}}">
                <div class="box">
                  <div class=" carousel-caption">{{$item->title}}</div>
                  @foreach($item->basic_photo as $image)
                  <img class="match-height" src="{{$image->medium}}" width="236" height="480"  alt="{{$item->title}}" />
                  @endforeach
                  <div class="overlay"></div>
                  <div class="overlay-info">
                    <div class="cat">
                      <a href="/الاحداث-الهامة"><p class="cat-data"><span class=""></span>الاحداث الهامة</p></a>
                    </div>
                    <div class="info">
                      <p><span class="ion-android-data"></span>{{$view->created_at}}<span class="ion-chatbubbles"></span>{{$view->views}}</p>
                    </div>
                  </div>
                </div>
                </a> </div>
                <?php $i = $i + 1;?>
                
                 @endif
                 <?php  if ($i > 1){ break; } ?>
            @endforeach

                
            @endforeach
            @endif
              <div class="col-md-16 col-lg-10">
                <div class="row">
                @if ($news_load->count())
                <?php $i = 1; ?>
                @foreach($news_load as $item)
                @foreach($item->features as $feature)
                @if ($feature->feature == 2 && $feature->status == 1)
                  <div class="col-sm-16 right-img-top "> <a href="/story/{{$item->link}}">
                    <div class="box">
                      <div class="carousel-caption">{{$item->title}}</div>
                      @foreach($item->basic_photo as $image)
                      <img class="img-responsive" src="{{$image->medium}}" width="440" height="292" alt="{{$item->title}}"/>
                      @endforeach
                      <div class="overlay"></div>
                      <div class="overlay-info">
                        <div class="cat">
                          <a href="/عاجل"><p class="cat-data"><span class=""></span>عاجل</p></a>
                        </div>
                        <div class="info">
                          <p><span class="ion-android-data"></span>{{$item->created_at}}<span class="ion-chatbubbles"></span>{{$item->views}}</p>
                        </div>
                      </div>
                    </div>
                    </a> </div>
                    <?php $i = $i + 1;?>
                    @endif

                    @endforeach
                    <?php  if ($i > 2){ break; } ?>
                    @endforeach
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- banner outer end --> 
      
    </div>
  </div>
  <!-- top sec end --> 
  
  <!-- data start -->
  
  <div class="container ">
    <div class="row "> 
      <!-- left sec start -->
      <div class="col-md-11 col-sm-11">
        <div class="row"> 
          <!-- business start -->

                
          <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
            <div class="main-title-outer pull-left">
              <div class="main-title">متميز</div>
              <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>اخر تحديث: {{$item->updated_at}}</span> </div>
            </div>
            <div class="row">
              <div class="col-md-11 col-sm-16">
                <div class="row">
                @if ($news_load->count())
                <?php $i = 1; ?>
                @foreach($news_load as $item)
                @if ($item->advantage == 2)
                  <div class="col-md-8 col-sm-9 col-xs-16">
                  @foreach($item->basic_photo as $image)
                    <div class="topic"> <a href="/story/{{$item->link}}"><img class="img-thumbnail" src="{{$image->medium}}" width="600" height="398" alt="{{$item->title}}"/>
                  @endforeach
                      <h3>{{$item->title}}</h3>
                      <div class="text-danger sub-info-bordered">
                        <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div>
                        <div class="comments"><span class="ion-chatbubbles icon"></span>0</div>
                        <div class="stars">انفراد</div>
                      </div>
                      </a>
                      <p>{{$item->summary}}</p>
                    </div>
                  </div>
                  <?php $i = $i + 1;?>
                  @endif
                  <?php  if ($i > 1){ break; } ?>
                  @endforeach
                  @endif
                  <div class="col-md-8 col-sm-7 col-xs-16">
                    <ul class="list-unstyled">
                    @if ($news_load->count())
                    <?php $i = 1; ?>
                    @foreach($news_load as $item)
                    @if ($item->advantage == 1)
                      <li> <a href="/story/{{$item->link}}">
                        <div class="row">
                        @foreach($item->basic_photo as $image)
                          <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="{{$image->small}}" width="76" height="76" alt="{{$item->title}}"/> </div>
                        @endforeach
                          <div class="col-sm-16 col-md-16 col-lg-11">
                            <h4>{{$item->title}}</h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div>
                              <div class="comments"><span class="ion-chatbubbles icon"></span>0</div>
                              <div class="stars">تغطية</div>
                            </div>
                          </div>
                        </div>
                        </a> </li>
                      <?php $i = $i + 1;?>
                  @endif
                  <?php  if ($i > 4){ break; } ?>
                  @endforeach
                  @endif
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-5 col-sm-16 hidden-sm hidden-xs  left-bordered">
                <div id="vid-thumbs" class="owl-carousel">

              @if ($news_load->count())
                  <div class="item">

                <?php $i = 1; ?>
                @foreach($news_load as $item)
                @if ($item->advantage == 3)
                    <div class="vid-thumb-outer">
                    @if ($i == 1)
                    @if ($item->valbums->count())
                    @foreach($item->valbums as $valbum)
                    @if ($valbums_videos->count())
                    @foreach ($valbums_videos as $video)
                    @if ($valbum->id == $video->news_video_album_id)
                      <div class="vid-thumb"><a class="popup-youtube" href="{{$video->video}}">
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                        @foreach($item->basic_photo as $image)
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="{{$image->thumbnail}}" width="250" height="143" alt=""/> </div>
                        @endforeach
                        <h4>{{$item->title}}</h4>
                        </a> </div>
                    @endif
                    @if ($i == 2)
                    @if ($item->valbums->count())
                    @foreach($item->valbums as $valbum)
                    @if ($valbums_videos->count())
                    @foreach ($valbums_videos as $video)
                    @if ($valbum->id == $video->news_video_album_id)
                      <div class="vid-thumb"><a class="popup-youtube" href="{{$video->video}}">
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                    @foreach($item->basic_photo as $image)
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="{{$image->thumbnail}}" width="250" height="143" alt=""/> </div>
                        @endforeach
                        <h4>{{$item->title}}</h4>
                        </a> </div>
                    @endif
                    </div>
                      <?php $i = $i + 1;?>
                  @endif
                  <?php  if ($i > 2){ break; } ?>
                  @endforeach
                  @endif
                  </div>
                  @if ($news_load->count())
                <?php $i = 1; ?>
                  <div class="item">

                @foreach($news_load as $item)
                @if ($item->advantage == 3)
                @if ($i > 2)
                    <div class="vid-thumb-outer">
                    @if ($i == 3)
                    @if ($item->valbums->count())
                    @foreach($item->valbums as $valbum)
                    @if ($valbums_videos->count())
                    @foreach ($valbums_videos as $video)
                    @if ($valbum->id == $video->news_video_album_id)
                      <div class="vid-thumb"><a class="popup-youtube" href="{{$video->video}}">
                      <?php break; ?>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                    @foreach($item->basic_photo as $image)
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="{{$image->thumbnail}}" width="250" height="143" alt=""/> </div>
                        @endforeach
                        <h4>{{$item->title}}</h4>
                        </a> </div>
                    @endif
                    @if ($i == 4)
                      @if ($item->valbums->count())
                    @foreach($item->valbums as $valbum)
                    @if ($valbums_videos->count())
                    @foreach ($valbums_videos as $video)
                    @if ($valbum->id == $video->news_video_album_id)
                      <div class="vid-thumb"><a class="popup-youtube" href="{{$video->video}}">
                      <?php break; ?>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                       @foreach($item->basic_photo as $image)
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="{{$image->thumbnail}}" width="250" height="143" alt=""/> </div>
                        @endforeach
                        <h4>{{$item->title}}</h4>
                        </a> </div>
                    @endif
                    </div>

                  @endif
                      <?php $i = $i + 1;?>
                  @endif
                  <?php  if ($i > 4){ break; } ?>
                  @endforeach
                  @endif
                  </div>
                  @if ($news_load->count())
                  <div class="item">

                <?php $i = 1; ?>
                @foreach($news_load as $item)
                @if ($item->advantage == 3)
                @if ($i > 4)
                    <div class="vid-thumb-outer">
                    @if ($i == 5)
                      @if ($item->valbums->count())
                    @foreach($item->valbums as $valbum)
                    @if ($valbums_videos->count())
                    @foreach ($valbums_videos as $video)
                    @if ($valbum->id == $video->news_video_album_id)
                      <div class="vid-thumb"><a class="popup-youtube" href="{{$video->video}}">
                      <?php break; ?>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                        @foreach($item->basic_photo as $image)
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="{{$image->thumbnail}}" width="250" height="143" alt=""/> </div>
                        @endforeach
                        <h4>{{$item->title}}</h4>
                        </a> </div>
                    @endif
                    @if ($i == 6)
                      @if ($item->valbums->count())
                    @foreach($item->valbums as $valbum)
                    @if ($valbums_videos->count())
                    @foreach ($valbums_videos as $video)
                    @if ($valbum->id == $video->news_video_album_id)
                      <div class="vid-thumb"><a class="popup-youtube" href="{{$video->video}}">
                      <?php break; ?>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                        @foreach($item->basic_photo as $image)
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="{{$image->thumbnail}}" width="250" height="143" alt=""/> </div>
                        @endforeach
                        <h4>{{$item->title}}</h4>
                        </a> </div>
                    @endif
                    </div>
                  @endif
                      <?php $i = $i + 1;?>
                  @endif
                  <?php  if ($i > 6){ break; } ?>
                  @endforeach
                  @endif
                  </div>
                  </div>
                </div>
              </div>
            <hr>
          </div>
          <!-- business end --> 
          
          <!-- Science & Travel start -->
          <div class="col-sm-16">
            <div class="row">
              <div class="col-xs-16 col-sm-8  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">
            
            <!--
            @if ($sections->count())
            @foreach($sections as $section)
                <div class="main-title-outer pull-left">
                  <div class="main-title">{{$section->name}}</div>
                  <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>اخر تحديث: {{$item->updated_at}}</span> </div>
                </div>
                @if ($news_load->count())
            @foreach($news_load as $item)
            <?php $i = 1; ?>
            @if ($item->sections->count())
            @foreach($item->sections as $sec)
            @if ($section->id == $sec->section)
                <div class="row">
                @if ($i == 1)
                @foreach($item->basic_photo as $image)
                  <div class="topic col-sm-16"> <a href="/story/{{$item->link}}"><img class=" img-thumbnail" src="{{$image->medium}}" width="600" height="227" alt="{{$item->title}}"/>
                @endforeach
                    <h3> {{$item->title}}</h3>
                    <div class="text-danger sub-info-bordered ">
                      <div class="time"><span class="ion-android-data icon"></span>{{$item->craeted_at}}</div>
                      <div class="comments"><span class="ion-chatbubbles icon"></span>0</div>
                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                    </div>
                    </a>
                    <p>{{$item->summary}}</p>
                  </div>
                @endif
                @if ($i > 1)
                  <div class="col-sm-16">
                    <ul class="list-unstyled  top-bordered ex-top-padding">
                      <li> <a href="/story/{{$item->link}}">
                        <div class="row">
                        @foreach($item->basic_photo as $image)
                          <div class="col-lg-3 col-md-4 hidden-sm  "><img width="76" height="76" alt="{{$item->title}}" src="{{$image->small}}" class="img-thumbnail pull-left"> </div>
                        @endforeach
                          <div class="col-lg-13 col-md-12">
                            <h4>{{$item->title}} </h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span>{{$item->craeted_at}}</div>
                              <div class="comments"><span class="ion-chatbubbles icon"></span>0</div>
                              <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                            </div>
                          </div>
                        </div>
                        </a> </li>
                    </ul>
                  </div>

                </div>
                  @endif  
            @endif
            @endforeach
            @endif
            @endforeach
            @endif
            <?php $i = $i +1; ?>
              @endforeach
              @endif
              </div>
              -->
              <div class="col-sm-8 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">
                <div class="main-title-outer pull-left">
                  <div class="main-title">travel</div>
                  <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 2 days ago</span> </div>
                </div>
                <div class="row left-bordered">
                  <div class="topic col-sm-16"> <a href="#"> <img  class="img-thumbnail" src="assets/frontend/images/travel/travel-main.jpg" width="600" height="227" alt=""/>
                    <h3>Feds open formal probe into tesla
                      electric ship</h3>
                    <div class="text-danger sub-info-bordered">
                      <div class="time"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                      <div class="comments"><span class="ion-chatbubbles icon"></span>204</div>
                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                    </div>
                    </a>
                    <p>Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                  </div>
                  <div class="col-sm-16">
                    <ul class="list-unstyled top-bordered ex-top-padding">
                      <li> <a href="#">
                        <div class="row">
                          <div class="col-lg-3 col-md-4 hidden-sm  "><img width="76" height="76" alt="" src="assets/frontend/images/travel/travel-th-1.jpg" class="img-thumbnail pull-left"> </div>
                          <div class="col-lg-13 col-md-12">
                            <h4>Irish cream and chocolate
                              cheesecake </h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                              <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                              <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                            </div>
                          </div>
                        </div>
                        </a> </li>
                      <li> <a href="#">
                        <div class="row ">
                          <div class="col-lg-3 col-md-4 hidden-sm  "><img width="76" height="76" alt="" src="assets/frontend/images/travel/travel-th-2.jpg" class="img-thumbnail pull-left"> </div>
                          <div class="col-lg-13 col-md-12">
                            <h4>Irish cream and chocolate
                              cheesecake </h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                              <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                              <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                            </div>
                          </div>
                        </div>
                        </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <!-- Scince & Travel end --> 
          <!-- lifestyle start-->
          @if ($news_load->count())
          <div class="col-sm-16 wow fadeInUp animated " data-wow-delay="0.5s" data-wow-offset="100">
            <div class="main-title-outer pull-left">
              <div class="main-title">الاحداث الهامة</div>
              <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 3 days ago</span> </div>
            </div>
            <div class="row">

            @foreach($news_load as $item)
            @foreach($item->features as $feature)
            @if ($feature->feature == 1 && $feature->status == 1)
              <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left">
              @foreach($item->basic_photo as $image)
                <div class="item topic"> <a href="/story/{{$item->link}}"> <img class="img-thumbnail" src="{{$image->thumbnail}}" width="300" height="132" alt="{{$item->title}}"/>
              @endforeach
                  <h4>{{$item->title}}</h4>
                  <div class="text-danger sub-info-bordered remove-borders">
                    <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div>
                    <div class="comments"><span class="ion-chatbubbles icon"></span>0</div>
                  </div>
                  </a> </div>
              </div>
              @endif
              @endforeach
              @endforeach
              @endif
            </div>
            <hr>
          </div>
          <!-- lifestyle end --> 
          
          <!--Recent videos start-->
          <div class="col-sm-16 recent-vid wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="50">
            <div class="main-title-outer pull-left">
              <div class="main-title">recent videos</div>
              <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 1 day ago</span> </div>
            </div>
            <div class="row">
              <div class="col-sm-11 col-xs-16"> 
                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="vid-first" class="tab-pane embed-responsive embed-responsive-16by9 active">
                    <iframe width="514" height="289" src="//www.youtube.com/embed/OFDAGiPJHL8?showinfo=0" frameborder="0" allowfullscreen></iframe>
                  </div>
                  <div id="vid-second" class="tab-pane embed-responsive embed-responsive-16by9">
                    <iframe width="514" height="289" frameborder="0" allowfullscreen="" src="//www.youtube.com/embed/TEnNaUg6Vm4?rel=0&amp;showinfo=0"></iframe>
                  </div>
                  <div id="vid-third" class="tab-pane embed-responsive embed-responsive-16by9">
                    <iframe width="514" height="289" src="//www.youtube.com/embed/rDZ1AjDJjFI?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <div class="col-sm-5 col-xs-2"> <!-- required for floating --> 
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-right hidden-xs">
                  <li class="active"><a data-toggle="tab" href="#vid-first">
                    <div class="vid-thumb">
                      <div class="vid-box"><span class="ion-eye"></span><img class="img-thumbnail" src="assets/frontend/images/recent-videos/re-vid-1.jpg" width="234" height="87" alt=""/> </div>
                    </div>
                    </a></li>
                  <li class=""><a data-toggle="tab" href="#vid-second">
                    <div class="vid-thumb">
                      <div class="vid-box"><span class="ion-eye"></span><img class="img-thumbnail" src="assets/frontend/images/recent-videos/re-vid-2.jpg" width="234" height="87" alt=""/> </div>
                    </div>
                    </a></li>
                  <li class=""><a data-toggle="tab" href="#vid-third">
                    <div class="vid-thumb">
                      <div class="vid-box"><span class="ion-eye"></span><img class="img-thumbnail" src="assets/frontend/images/recent-videos/re-vid-3.jpg" width="234" height="87" alt=""/> </div>
                    </div>
                    </a></li>
                </ul>
              </div>
            </div>
            <hr>
          </div>
          <!--Recent videos end--> 
          <!--wide ad start-->
          <div class="col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="25"><img class="img-responsive" src="assets/frontend/images/ads/728-90-ad.gif" width="728" height="90" alt=""/></div>
          <!--wide ad end--> 
          
        </div>
      </div>
      <!-- left sec end --> 
      <!-- right sec start -->
      <div class="col-sm-5 hidden-xs right-sec">
        <div class="bordered top-margin">
          <div class="row ">
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <img class="img-responsive" src="assets/frontend/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">sponsored advert</a> </div>
            <div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="150">
              <div class="table-responsive">
                <table class="table table-bordered social">
                  <tbody>
                    <tr>
                      <td><a class="rss" href="#">
                        <p> <span class="ion-social-rss"></span> subscribe<br>
                          to rss</p>
                        </a></td>
                      <td><a class="twitter" href="#">
                        <p><span class="ion-social-twitter"></span> 811,6
                          followers</p>
                        </a></td>
                      <td><a class="facebook" href="#">
                        <p> <span class="ion-social-facebook"></span> 6958,56<br>
                          fans</p>
                        </a></td>
                    </tr>
                    <tr>
                      <td><a class="youtube" href="#">
                        <p> <span class="ion-social-youtube"></span> 6954,55
                          subscribers</p>
                        </a></td>
                      <td><a class="vimeo" href="#">
                        <p><span class="ion-social-vimeo"></span> 896,7
                          subscribers</p>
                        </a></td>
                      <td><a class="dribbble" href="#">
                        <p> <span class="ion-social-dribbble-outline"></span> 6321,56
                          followers</p>
                        </a></td>
                    </tr>
                    <tr>
                      <td><a class="googleplus" href="#">
                        <p> <span class="ion-social-googleplus"></span> 9625.56
                          followers</p>
                        </a></td>
                      <td><a class="pinterest" href="#">
                        <p><span class="ion-social-pinterest"></span> 741,9
                          followers</p>
                        </a></td>
                      <td><a class="instagram" href="#">
                        <p> <span class="ion-social-instagram"></span> 3548,7
                          followers</p>
                        </a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- activities start -->
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-justified " role="tablist">
                <li class="active"><a href="#popular" role="tab" data-toggle="tab">popular</a></li>
                <li><a href="#recent" role="tab" data-toggle="tab">recent</a></li>
                <li><a href="#comments" role="tab" data-toggle="tab">comments</a></li>
              </ul>
              
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="popular">
                  <ul class="list-unstyled">
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5 col-md-4"><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-1.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11 col-md-12">
                          <h4>Tellus. Phasellus viverra nulla ut metus</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-2.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11 col-md-12">
                          <h4>The evolution of the apple ..</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-3.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11 col-md-12">
                          <h4>The evolution of the apple ..</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-4.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11 col-md-12">
                          <h4>The evolution of the apple ..</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-5.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11 col-md-12">
                          <h4>The evolution of the apple ..</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                  </ul>
                </div>
                <div class="tab-pane" id="recent">
                  <ul class="list-unstyled">
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-5.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>The evolution of the apple ..</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-4.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>The evolution of the apple ..</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-3.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>The evolution of the apple ..</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-2.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>The evolution of the apple ..</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/popular/pop-1.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>The evolution of the apple ..</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                            <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                            <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                          </div>
                        </div>
                      </div>
                      </a> </li>
                  </ul>
                </div>
                <div class="tab-pane" id="comments">
                  <ul class="list-unstyled">
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/comments/com-1.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>Tellus Phasellus viverra nulla</h4>
                          <p>Cum sociis natoque penatibus et magnis dis parturient montes..</p>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/comments/com-2.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>The evolution of the apple ..</h4>
                          <p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo..</p>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/comments/com-3.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>The evolution of the apple ..</h4>
                          <p>Donec pede justo, fringilla vel, aliquet nec vulputate..</p>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/comments/com-4.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-12">
                          <h4>The evolution of the apple ..</h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="assets/frontend/images/comments/com-5.jpg" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>The evolution of the apple ..</h4>
                          <p>Beatae vitae dicta sunt.explicabo ipsam..</p>
                        </div>
                      </div>
                      </a> </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- activities end --> 
            <!-- radio start -->
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="100">
              <div class="main-title-outer pull-left">
                <div class="main-title">globalnews radio</div>
              </div>
              <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/172078992&amp;color=e74c3c&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
            </div>
            <!-- radio end --> 
            
            <!-- calendar start -->
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50">
              <div class="single pull-left"></div>
            </div>
            <!-- calendar end --> 
            <!-- flicker imgs start -->
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="35">
              <div class="main-title-outer pull-left">
                <div class="main-title">flicker images</div>
              </div>
              <ul class="list-inline">
                <li><a href="https://flic.kr/p/pGKEzR" target="_blank"><img class="img-responsive" src="https://farm4.staticflickr.com/3944/15557385115_2d191a5cc7_s.jpg" width="55" height="55" alt=""/></a></li>
                <li><a href="https://flic.kr/p/pq5PiE" target="_blank"><img class="img-responsive" src="https://farm4.staticflickr.com/3956/15368741148_ef02d92a65_s.jpg" width="55" height="55" alt=""/></a></li>
                <li><a href="https://flic.kr/p/pq9rDD" target="_blank"><img class="img-responsive" src="https://farm6.staticflickr.com/5608/15369448747_fd3f69cbb7_s.jpg" width="55" height="55" alt=""/></a></li>
                <li><a href="https://flic.kr/p/pGM4yz" target="_blank"><img class="img-responsive" src="https://farm4.staticflickr.com/3946/15557657525_da199f6917_s.jpg" width="55" height="55" alt=""/></a></li>
                <li><a href="https://flic.kr/p/pH6FJ4" target="_blank"><img class="img-responsive" src="https://farm4.staticflickr.com/3953/15561291195_e7ecf7d3a1_s.jpg" width="55" height="55" alt=""/></a></li>
                <li><a href="https://flic.kr/p/pqoKFn" target="_blank"><img class="img-responsive" src="https://farm4.staticflickr.com/3953/15372240967_9ee086188c_s.jpg" width="55" height="55" alt=""/></a></li>
                <li><a href="https://flic.kr/p/pGHh6g" target="_blank"><img class="img-responsive" src="https://farm4.staticflickr.com/3944/15556919225_c7d99f9667_s.jpg" width="55" height="55" alt=""/></a></li>
                <li><a href="https://flic.kr/p/pqxJZC" target="_blank"><img class="img-responsive" src="https://farm4.staticflickr.com/3939/15373994670_8c756abcb0_s.jpg" width="55" height="55" alt=""/></a></li>
                <li><a href="https://flic.kr/p/pEPtj9" target="_blank"><img class="img-responsive" src="https://farm4.staticflickr.com/3938/15535494656_d04ef318a0_s.jpg" width="55" height="55" alt=""/></a></li>
                <li><a href="https://flic.kr/p/pqjpxX" target="_blank"><img class="img-responsive" src="https://farm6.staticflickr.com/5605/15371392809_5069f8772d_s.jpg" width="55" height="55" alt=""/></a></li>
              </ul>
            </div>
            <!-- flicker imgs end --> 
          </div>
        </div>
      </div>
      <!-- right sec end --> 
    </div>
  </div>
  <!-- data end --> 
  @endsection
@section('footer-scripts')
  <!-- jQuery --> 
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script> 
<!--jQuery easing--> 
<script src="{{ asset('assets/frontend/js/jquery.easing.1.3.js') }}"></script> 
<!-- bootstrab js --> 
<script src="{{ asset('assets/frontend/js/bootstrap.js') }}"></script> 
<!--style switcher--> 
<script src="{{ asset('assets/frontend/js/style-switcher.js') }}"></script> <!--wow animation--> 
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script> 
<!-- time and date --> 
<script src="{{ asset('assets/frontend/js/moment.min.js') }}"></script> 
<!--news ticker--> 
<script src="{{ asset('assets/frontend/js/jquery.ticker.js') }}"></script> 
<!-- owl carousel --> 
<script src="{{ asset('assets/frontend/js/owl.carousel.js') }}"></script> 
<!-- magnific popup --> 
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.js') }}"></script> 
<!-- weather --> 
<script src="{{ asset('assets/frontend/js/jquery.simpleWeather.min.js') }}"></script> 
<!-- calendar--> 
<script src="{{ asset('assets/frontend/js/jquery.pickmeup.js') }}"></script> 
<!-- go to top --> 
<script src="{{ asset('assets/frontend/js/jquery.scrollUp.js') }}"></script> 
<!-- scroll bar --> 
<script src="{{ asset('assets/frontend/js/jquery.nicescroll.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/jquery.nicescroll.plus.js') }}"></script> 
<!--masonry--> 
<script src="{{ asset('assets/frontend/js/masonry.pkgd.js') }}"></script> 
<!--media queries to js--> 
<script src="{{ asset('assets/frontend/js/enquire.js') }}"></script> 
<!--custom functions--> 
<script src="{{ asset('assets/frontend/js/custom-fun.js') }}"></script>
@endsection
@stop 