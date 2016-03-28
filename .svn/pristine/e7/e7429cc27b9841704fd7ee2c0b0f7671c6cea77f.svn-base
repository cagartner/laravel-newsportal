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
  <section>
    <div class="container ">
      <div class="row "> 
        <!-- left sec start -->
        <div class="col-md-11 col-sm-11">
          <div class="row">
          @if ($news_search->count())
            <div class="col-sm-16">
              <h3>عدد النتائج <span class="text-danger">{{$news_search_count->count()}}</span> خبر للتاريخ: {{$_GET['date']}}</h3>
              <hr>
            </div>
            @if ($news_search->count())
            @foreach($news_search as $item)
            @foreach($item->basic_photo as $image)
            <div class="sec-topic col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s">
              <div class="row">
                <div class="col-sm-7"><img width="1000" height="606" alt="" src="/{{$image->medium}}" class="img-thumbnail"></div>
                <?php
                      $date = $item->created_at;
                      $date = date('Y-m-d', strtotime($date));
                    ?>

                <div class="col-sm-9"> <a href="/story/{{$date}}/{{$item->link}}">
                  <div class="sec-info">
                    <h3>{{$item->title}}</h3>
                    <div class="text-danger sub-info-bordered">
                      <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div></div>
                    </div>
                  </div>
                  </a>
                  <?php
                                                    $limit = 290;
                                                    $subject = $item->subject;
                                                        if (strlen($subject) > $limit)
                                                          $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
                                                ?>
                  <p>{!! $subject !!}
                    <br><mark>المؤلف</mark>
                    {{$item->author}} </p>
                </div>
              </div>
            

            @endforeach
            @endforeach
            @endif
            <div class="col-sm-16">
              <div class="row">
                  <div class="col-md-12">
                      <div class="product-pagination text-center">
                          <nav>
                              <ul class="pagination">
                                {!! $news_search->appends(['date' => $_GET['date']])->render() !!}
                              </ul>
                          </nav>                        
                      </div>
                  </div>
              </div>
            </div>
            @else
              <h1 style="margin-right: 250px;font-size: 50px;margin-top: 50px;">لا توجد نتائج</h1>
            @endif
          </div>
        </div>
        <!-- left sec end --> 
        
        <!-- right sec start -->
        @include('frontend.blocks.rightsidebar')
      <!-- right sec end --> 
      </div>
    </div>
  </section>
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