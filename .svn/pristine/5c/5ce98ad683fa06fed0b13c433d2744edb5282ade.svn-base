@extends('frontend.master')
@section('meta_keywords')
<?php
  $url = $_SERVER['REQUEST_URI'];
  $tokens = explode('/', $url);
  $date = $tokens[2];
  foreach($news as $item){
    $keywords = $item->title;
  }
  $keywords_str = $date . ',';
  $keywords = explode(' ', $keywords);
  foreach ($keywords as $key => $value) {
    $keywords_str .= $value . ',';
  }
?>
@if (!empty($keywords_str))
  <meta name="keywords" content="{{$keywords_str}}">
@endif
@endsection
@section('header-content')
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
<style type="text/css">
  div.col-sm-5.hidden-xs.right-sec{
    margin-top: -45px !important;
  }
  iframe#twitter-widget-0.twitter-share-button.twitter-share-button-rendered.twitter-tweet-button{
    margin-left: 5px;
    margin-top: 9px;
  }
  .popular-tags {
    border-right: none;
    height: auto !important;
  }
</style>
@endsection
@section('content')
  <div class="container">
    <div class="page-header">
    @if ($news->count())
                 @foreach($news as $item)
      <h1>{{$item->title}}</h1>
     
      <ol class="breadcrumb">
        <li><a href="/home">الرئيسية</a></li>
        <li><a href="#">الاخبار</a></li>
        <li class="active">{{$item->title}}</li>
      </ol>
      <?php break; ?>
       @endforeach
      @endif
    </div>
  </div>
  <!-- bage header End --> 
  <!-- data Start -->
  <section>
    <div class="container ">
      <div class="row "> 
        <!-- left sec Start -->
        <div class="col-md-11 col-sm-11">
          <div class="row"> 
            <!-- post details start -->
            <div class="col-sm-16">
              <div class="row">
              @if ($news->count())
                 @foreach($news as $item)
                  
                <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">
                  <div class="row">
                  @foreach($item->basic_photo as $image)
                    <div class="col-sm-16"><img width="1000" height="606" alt="" src="/{{$image->large}}" class="img-thumbnail"></div>
                    <?php break; ?>
                    @endforeach
                    <div class="col-sm-16 sec-info">
                      <h3>{{$item->title}}</h3>
                      <div class="text-danger sub-info-bordered">
                        <div class="author"><span class="ion-person icon"></span>{{$item->author}}</div>
                        <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div>
                      </div>
                      <p>{!! $item->subject !!}</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-16 author-box">
                  <div class="row">
                    <div class="col-xs-12 col-sm-14">
                      <h4><a href="#">المؤلف: {{$item->author}}</a></h4>
                    </div>
                  </div>
                  @if ($item->publish_facebook == 1)
                  <div class="row">
                    <div class="col-xs-12 col-sm-14">
                      <div id="social-icons">
                                    <table>
                                    <tr>

                                        <?php $url = $_SERVER['REQUEST_URI']; ?>
                                        <td>
                                        <div id="fb-root"></div>
                                        <div class="fb-share-button" data-href="http://news.innocastle.com/{{$url}}" data-layout="button_count"  style="margin-left: 10px;margin-top: 6px;"></div>
                                        </td>
                                        <td>
                                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="">Tweet</a>
                                        </td>
                                    </tr>
                                    </table>
                                    </div>
                    </div>
                  </div>
                  @endif
                  <?php break; ?>
                  @endforeach
                  @endif
                </div>
                <div class="col-sm-16">
                  <div class="main-title-outer pull-left">
                    <div class="main-title">التعليقات</div>
                  </div>
                  <div class="col-xs-16 wow zoomIn animated">
                    <div id="fb-root"></div>
                    <script>
                      window.fbAsyncInit = function() {
                        FB.init({
                          appId      : '1652136028408328',
                          xfbml      : true,
                          version    : 'v2.5'
                        });
                      };

                      (function(d, s, id){
                         var js, fjs = d.getElementsByTagName(s)[0];
                         if (d.getElementById(id)) {return;}
                         js = d.createElement(s); js.id = id;
                         js.src = "//connect.facebook.net/ar_AR/sdk.js";
                         fjs.parentNode.insertBefore(js, fjs);
                       }(document, 'script', 'facebook-jssdk'));
                    </script>

                    @foreach ($news as $item)
                    <div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/{{$item->id}}" data-numposts="15" data-width="770"></div>
                    <?php break; ?>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!-- post details end --> 
            
          </div>
            <div class="col-sm-16 popular-tags  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <ul class="tags list-unstyled pull-left">
            @if ($news->count())
              @foreach ($news as $item)
              @foreach ($item->tags as $tag)
              <?php 
                $path = $tag->tags;
                $path = str_replace(' ', '-', $path);
              ?>
                <li><a href="/tags/{{$path}}">{{$tag->tags}}</a></li>
              @endforeach
              @endforeach
            @endif
            </ul>
          </div>


          <div class="row">
              @if ($news->count())
                 @foreach($news as $news_item)
                 @if ($news_item->palbums->count())
                 
                  @foreach($news_item->palbums as $item)
                  @if (!empty($item->name))
                  <h2>البوم الصور</h2>
                <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">
                  <div class="row">
                    <div class="col-sm-16 sec-info">
                      <h3>{{$item->name}}</h3>
                      <div class="text-danger sub-info-bordered">
                        <div class="author"><span class="ion-person icon"></span>{{$item->photographer}}</div>
                        <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div>
                      </div>
                      <p>{!! $item->subject !!}</p>
                    </div>
                  </div>
                </div>
                                @endif
                @endforeach

                @endif
                @endforeach
              @endif
          </div>



        @if ($palbum_images->count())
        <div class="row "> 
        <!-- left sec start -->
        <div class="col-md-11 col-sm-11">
          <div class="row"> 
            <!-- gallery start -->
            <div class="gallery">
            @foreach ($palbum_images as $image)
              <div class="col-sm-8 wow fadeInDown animated "> <a class="gallery-item" href="/{{$image->large}}" class="popup-img">
                <div class="thumb-box"><span class="ion-arrow-expand"></span>
                  <img width="1600" height="972" alt="" src="/{{$image->large}}" class="img-thumbnail"></div>
                </a> </div>
            @endforeach
            </div>
          </div>
        </div>
        </div>
        @endif

           <div class="row">
          
              @if ($news->count())
                 @foreach($news as $news_item)
                 @if ($news_item->valbums->count())
                 
                  @foreach($news_item->valbums as $item)
                  @if (!empty($item->name))
                 <h2>البوم الفيديو</h2>
                <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">
                  <div class="row">
                    <div class="col-sm-16 sec-info">
                      <h3>{{$item->name}}</h3>
                      <div class="text-danger sub-info-bordered">
                        <div class="author"><span class="ion-person icon"></span>{{$item->photographer}}</div>
                        <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div>
                      </div>
                      <p>{!! $item->subject !!}</p>
                    </div>
                  </div>
                </div>
                                @endif
                @endforeach

                @endif
                @endforeach
              @endif
          </div>



        @if ($valbum_videos->count())
        <div class="row "> 
        <!-- left sec start -->
        <div class="col-md-11 col-sm-11">
          <div class="row"> 
            <!-- gallery start -->
            <div class="gallery">
            @foreach ($valbum_videos as $videos)
                <div class="thumb-box"><span class="ion-arrow-expand"></span>
                  <iframe width="100%" height="166" scrolling="no" frameborder="no" src="{{$videos->video}}"></iframe>
                </a> </div>
            @endforeach
            </div>
          </div>
        </div>
        </div>
       @endif





        </div>

        <!-- left sec End --> 
        <!-- right sec Start -->
          @include('frontend.blocks.rightsidebar')
        <!-- Right Sec End --> 
      </div>
    </div>
  </section>
  <!-- Data End -->     
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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
@endsection
@stop 