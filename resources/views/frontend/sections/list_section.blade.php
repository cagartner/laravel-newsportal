@extends('frontend.master')
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
</style>
@endsection
@section('content')

  <div class="container"> 
    
    <!-- bage header start -->
    <div class="page-header">
      <h1>{{$sections->name}}</h1>
      <ol class="breadcrumb">
        <li><a href="/home">الرئيسية</a></li>
        <li><a href="#">الاقسام</a></li>
        <li class="active">{{$sections->name}}</li>
      </ol>
    </div>
    
    <!-- bage header end --> 
    
  </div>
  
  <!-- data start -->
  <section>
    <div class="container ">
      <div class="row "> 
        <!-- left sec start -->
        <div class="col-md-11 col-sm-11">
          <div class="row">
          @foreach($news as $item)
          <?php
                      $date = '';
                      $date = $item->created_at;
                      $date = date('Y-m-d', strtotime($date));
                    ?>

            <div class="sec-topic col-sm-16 col-md-8 wow fadeInDown animated " data-wow-delay="0.5s"> <a href="/story/{{$date}}/{{$item->link}}"><img width="1000" height="606" alt="{{$item->title}}" src="/{{$item->large}}" class="img-thumbnail">
              <div class="sec-info">
                <h3>{{$item->title}}</h3>
                <div class="text-danger sub-info-bordered">
                  <div class="time"><span class="ion-android-data icon"></span>{{$item->created_at}}</div>
                </div>
              </div>
              </a>
              <?php
              $limit = 250;
                                $subject = $item->subject;
                                    if (strlen($subject) > $limit)
                                      $subject = substr($subject, 0, strrpos(substr($subject, 0, $limit), ' ')) . '...';
                                ?>
              <p>{!! $subject !!}</p>
            </div>
            @endforeach
            
            
          </div>
        </div>
        <!-- left sec end --> 
        
        <!-- right sec start -->
          @include('frontend.blocks.rightsidebar')
      </div>
    </div>
  </section>
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