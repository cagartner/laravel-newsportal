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
            <?php
              $date = $item->created_at;
              $date = date('Y-m-d', strtotime($date));
            ?>
              <li class="news-item"><a href="/story/{{$date}}/{{$item->link}}">{{$item->title}}</a></li>
              <?php break; ?>
            @endif

            @endforeach
            @endforeach
            @endif
            </ul>
          </div>
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
              <?php
                $date = $item->created_at;
                $date = date('Y-m-d', strtotime($date));
              ?>
              <div class="box item"> <a href="/story/{{$date}}/{{$item->link}}">
                <div class="carousel-caption">{{$view->title}}</div>
                @foreach($view->basic_photo as $image)
                <img class="img-responsive" src="/{{$image->large}}" width="1600" height="972" alt="{{$view->title}}"/>
                @endforeach
                <div class="overlay"></div>
                <div class="overlay-info">
                  <div class="cat">
                  @if ($view->sections->count())
                  @foreach($view->sections as $sec)
                  @if ($sections->count())
                    @foreach($sections as $section)
                    @if ($section->id == $sec->section && $sec->status == 1)
                    <?php
                      $path = str_replace(' ', '-', $section->name);
                    ?>
                    <a href="/section/{{$path}}"></a><p class="cat-data"><span class=""></span>{{$section->name}}</p>
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
                    <div class="item"><img class=" img-responsive" src="/{{$image->large}}"  width="1600" height="972" alt=""/></div>
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
              <?php
                $date = $item->created_at;
                $date = date('Y-m-d', strtotime($date));
              ?>
              <div class="col-lg-6 hidden-md"><a href="/story/{{$date}}/{{$item->link}}">
                <div class="box">
                  <div class=" carousel-caption">{{$item->title}}</div>
                  @foreach($item->basic_photo as $image)
                  <img class="match-height" src="/{{$image->large}}" width="236" height="480"  alt="{{$item->title}}" />
                  @endforeach
                  <div class="overlay"></div>
                  <div class="overlay-info">
                    <div class="cat">
                      <a href="/features/الاحداث-الهامة"><p class="cat-data"><span class=""></span>الاحداث الهامة</p></a>
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
                  <?php
                    $date = $item->created_at;
                    $date = date('Y-m-d', strtotime($date));
                  ?>
                  <div class="col-sm-16 right-img-top "> <a href="/story/{{$date}}/{{$item->link}}">
                    <div class="box">
                      <div class="carousel-caption">{{$item->title}}</div>
                      @foreach($item->basic_photo as $image)
                      <img class="img-responsive" src="/{{$image->medium}}" width="440" height="292" alt="{{$item->title}}"/>
                      @endforeach
                      <div class="overlay"></div>
                      <div class="overlay-info">
                        <div class="cat">
                          <a href="/features/عاجل"><p class="cat-data"><span class=""></span>عاجل</p></a>
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
              <div class="span-outer"><span class="pull-it-left text-danger last-update"><span class="ion-android-data icon"></span>اخر تحديث: {{$item->updated_at}}</span> </div>
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
                    <?php
                      $date = $item->created_at;
                      $date = date('Y-m-d', strtotime($date));
                    ?>
                    <div class="topic"> <a href="/story/{{$date}}/{{$item->link}}"><img class="img-thumbnail" src="/{{$image->medium}}" width="600" height="398" alt="{{$item->title}}"/>
                  @endforeach
                      <h3>{{$item->title}}</h3>
                      <div class="text-danger sub-info-bordered">
                        <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div>
                        
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
                      <?php
                        $date = $item->created_at;
                        $date = date('Y-m-d', strtotime($date));
                      ?>
                      <li> <a href="/story/{{$date}}/{{$item->link}}">
                        <div class="row">
                        @foreach($item->basic_photo as $image)
                          <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="/{{$image->small}}" width="76" height="76" alt="{{$item->title}}"/> </div>
                        @endforeach
                          <div class="col-sm-16 col-md-16 col-lg-11">
                            <h4>{{$item->title}}</h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div>
                              
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
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="/{{$image->thumbnail}}" width="250" height="143" alt=""/> </div>
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
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="/{{$image->thumbnail}}" width="250" height="143" alt=""/> </div>
                        @endforeach
                        <h4>{{$item->title}}</h4>
                        </a> </div>
                    @endif
                    </div>
                      <?php $i = $i + 1;?>
                  @endif
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
            
            <?php $i = 1; ?>
            @if ($sections->count())
            @foreach($sections as $mysec)
            <?php $j = 1; ?>
            @if ($i % 2 != 0)
            <div class="row">
              <div class="col-xs-16 col-sm-8  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">
                <div class="main-title-outer pull-left">
                <?php
                  $path = str_replace(' ', '-', $mysec->name);
                ?>
                  <a href="/section/{{$path}}"><div class="main-title">{{$mysec->name}}</div></a>
                </div>
                <div class="row">
                
                @foreach ($news_related_sections as $sec_news)
                @if ($mysec->id == $sec_news->section)
                @if ($j == 1)
                  <?php
                      $date = '';
                      $date = $sec_news->created_at;
                      $date = date('Y-m-d', strtotime($date));
                  ?>
                  <div class="topic col-sm-16"> <a href="/story/{{$date}}/{{$sec_news->link}}"><img class=" img-thumbnail" src="/{{$sec_news->thumbnail}}" width="600" height="227" alt=""/>
                    <h3> {{$sec_news->title}}</h3>
                    <div class="text-danger sub-info-bordered ">
                      <div class="time"><span class="ion-android-data icon"></span>{{$sec_news->created_at}}</div>
                                          </div>
                    </a>
                    <?php
                                                    $limit = 290;
                                                    $subject = $sec_news->subject;
                                                        if (strlen($subject) > $limit)
                                                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
                                                ?>
                    <p>{!! $subject !!}</p>
                  </div>
                @elseif($j > 1)
                  <div class="col-sm-16">
                    <ul class="list-unstyled  top-bordered ex-top-padding">
                    @if ($j == 2)
                      <?php
                          $date = '';
                          $date = $sec_news->created_at;
                          $date = date('Y-m-d', strtotime($date));
                      ?>

                      <li> <a href="/story/{{$date}}/{{$sec_news->link}}">
                        <div class="row">
                          <div class="col-lg-3 col-md-4 hidden-sm  "><img width="76" height="76" alt="" src="/{{$sec_news->small}}" class="img-thumbnail pull-left"> </div>
                          <div class="col-lg-13 col-md-12">
                            <h4>{{$sec_news->title}}</h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span>{{$sec_news->created_at}}</div>
                                                          </div>
                          </div>
                        </div>
                        </a> </li>
                    @endif
                    @if ($j == 3)
                      <?php
                          $date = '';
                          $date = $sec_news->created_at;
                          $date = date('Y-m-d', strtotime($date));
                      ?>
                      <li> <a href="/story/{{$date}}/{{$sec_news->link}}">
                        <div class="row">
                          <div class="col-lg-3 col-md-4 hidden-sm  "><img width="76" height="76" alt="" src="/{{$sec_news->small}}" class="img-thumbnail pull-left"> </div>
                          <div class="col-lg-13 col-md-12">
                            <h4>{{$sec_news->title}}</h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span>{{$sec_news->created_at}}</div>
                                                          </div>
                          </div>
                        </div>
                        </a> </li>
                    @endif
                    </ul>
                  </div>
                @endif
                  <?php $j = $j + 1; ?>
                  @endif
                  @endforeach
                  
                </div>
              </div>
            @endif
            @if ($i % 2 == 0)
              <div class="col-sm-8 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">
                <div class="main-title-outer pull-left">
                  <?php
                  $path = str_replace(' ', '-', $mysec->name);
                ?>
                  <a href="/section/{{$path}}"><div class="main-title">{{$mysec->name}}</div></a>
                </div>
                <div class="row left-bordered">
                <?php $j = 1; ?>
                  @foreach ($news_related_sections as $sec_news)
                @if ($mysec->id == $sec_news->section)
                @if ($j == 1)
                  <?php
                          $date = '';
                          $date = $sec_news->created_at;
                          $date = date('Y-m-d', strtotime($date));
                      ?>

                  <div class="topic col-sm-16"> <a href="/story/{{$date}}/{{$sec_news->link}}"><img class=" img-thumbnail" src="/{{$sec_news->thumbnail}}" width="600" height="227" alt=""/>
                    <h3> {{$sec_news->title}}</h3>
                    <div class="text-danger sub-info-bordered ">
                      <div class="time"><span class="ion-android-data icon"></span>{{$sec_news->created_at}}</div>
                                          </div>
                    </a>
                    <?php
                                                    $limit = 290;
                                                    $subject = $sec_news->subject;
                                                        if (strlen($subject) > $limit)
                                                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
                                                ?>
                    <p>{!! $subject !!}</p>
                  </div>
                @elseif($j > 1)
                  <div class="col-sm-16">
                    <ul class="list-unstyled  top-bordered ex-top-padding">
                    @if ($j == 2)
                      <?php
                          $date = '';
                          $date = $sec_news->created_at;
                          $date = date('Y-m-d', strtotime($date));
                      ?>
                      <li> <a href="/story/{{$date}}/{{$sec_news->link}}">
                        <div class="row">
                          <div class="col-lg-3 col-md-4 hidden-sm  "><img width="76" height="76" alt="" src="/{{$sec_news->small}}" class="img-thumbnail pull-left"> </div>
                          <div class="col-lg-13 col-md-12">
                            <h4>{{$sec_news->title}}</h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span>{{$sec_news->created_at}}</div>
                                                          </div>
                          </div>
                        </div>
                        </a> </li>
                    @endif
                    @if ($j == 3)
                    <?php
                          $date = '';
                          $date = $sec_news->created_at;
                          $date = date('Y-m-d', strtotime($date));
                      ?>
                      <li> <a href="/story/{{$date}}/{{$sec_news->link}}">
                        <div class="row">
                          <div class="col-lg-3 col-md-4 hidden-sm  "><img width="76" height="76" alt="" src="/{{$sec_news->small}}" class="img-thumbnail pull-left"> </div>
                          <div class="col-lg-13 col-md-12">
                            <h4>{{$sec_news->title}}</h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span>{{$sec_news->created_at}}</div>
                                                          </div>
                          </div>
                        </div>
                        </a> </li>
                    @endif
                    </ul>
                  </div>
                @endif
                  <?php $j = $j + 1; ?>
                  @endif
                  @endforeach
                </div>
              </div>
            </div>
            @endif
            <?php $i = $i +1; ?>
              @endforeach
            @endif
            <hr>
          </div>
          <!-- Scince & Travel end --> 
          <!-- lifestyle start-->
          @if ($last_news->count())
          <div class="col-sm-16 wow fadeInUp animated " data-wow-delay="0.5s" data-wow-offset="100">
            <div class="main-title-outer pull-left">
              <div class="main-title">احدث الاخبار</div>
              @foreach($last_news as $view)
              <div class="span-outer"><span class="pull-it-left text-danger last-update"><span class="ion-android-data icon"></span>اخر تحديث: {{$view->updated_at}}</span> </div>
              <?php break; ?>
              @endforeach
            </div>
            <div class="row">
              <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left">
                @foreach($last_news as $view)
                @foreach($view->basic_photo as $image)
                <?php
                      $date = $view->created_at;
                      $date = date('Y-m-d', strtotime($date));
                    ?>
                <div class="item topic"> <a href="/story/{{$date}}/{{$view->link}}"> <img class="img-thumbnail" src="/{{$image->thumbnail}}" width="300" height="132" alt="{{$view->title}}"/>
                  <h4>{{$view->title}}</h4>
                  <div class="text-danger sub-info-bordered remove-borders">
                    <div class="time"><span class="ion-android-data icon"></span>{{$view->created_at}}</div>
                                      </div>
                  </a> </div>
                @endforeach
                @endforeach
              </div>
            </div>
            <hr>
          </div>
          @endif
          <!-- lifestyle end --> 
          
          <!--wide ad start-->
          @if ($adv->count())
            @foreach ($adv as $view)
            @if ($view->position == 3)
            @foreach ($view->images as $myimage)
          <div class="col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="25"><img class="img-responsive" src="/{{$myimage->large}}" width="728" height="90" alt=""/></div>
          <!--wide ad end--> 
          @endforeach
          @endif
          @endforeach
          @endif
          
        </div>
      <!-- left sec end -->
      <!-- right sec start -->
      @include('frontend.blocks.rightsidebar')
      <!-- right sec end --> 
    </div>
  </div>
  <!-- data end --> 

<!-- wrapper end --> 
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
<script src="{{ asset('assets/frontend/js/custom_js.js') }}"></script>
@endsection
@stop 