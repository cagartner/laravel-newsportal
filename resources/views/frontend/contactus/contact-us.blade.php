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
  <!-- bage header End --> 
@endsection
@section('content')
  <div class="container">
    <div class="page-header">
      <h1>تواصل معنا </h1>
      <ol class="breadcrumb">
        <li><a href="/home">الرئيسية</a></li>
        <li class="active">تواصل معنا</li>
      </ol>
    </div>
  </div>
  <!-- data Start -->
  <section>
    <div class="container ">
      <div class="row "> 
        <!-- left sec Start -->
        <div class="col-sm-16">
          <div class="row">
            <div id="map_canvas" class="col-sm-16"> 
                                        @foreach ($gmap as $map)
                                        <div  class="transfer">
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    العنوان: <input type="text" id="address" value="{{$map->address}}" />
                                                </div>
                                                <div class="form-group">
                                                    خط العرض: <input type="text" id="latitude" value="{{$map->latitude}}" />
                                                </div>
                                                <div class="form-group">
                                                    خط الطول: <input type="text" id="longitude" value="{{$map->longitude}}" />
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
              <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
              <div style="overflow:hidden;height:400px;width:100%;">
                <div id="gmap_canvas" style="height:400px;width:100%;"></div>
                <style>
                  #gmap_canvas img{max-width:none!important;background:none!important}
                </style>
                <a class="google-map-code" href="http://www.trivoo.net/gutscheine/sheego/" id="get-map-data">trivoo</a></div>
              <script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng($('#latitude').val(), $('#longitude').val()),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng($('#latitude').val(), $('#longitude').val())});infowindow = new google.maps.InfoWindow({content:"<b>Egypt</b><br/><br/> Cairo" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});}google.maps.event.addDomListener(window, 'load', init_map);</script> 
            </div>
            <br>
            <div class="col-sm-16">
              <div class="row">
                <div class="main-title-outer pull-left">
                  <div class="main-title">تواصل معنا</div>
                </div>
                <div class="col-sm-11">
                  {!! Form::open(array('method' => 'post')) !!}
                    <div class="row">
                      <div class="form-group col-xs-16 col-sm-8 name-field">
                        <input type="text" placeholder="الاسم" required="" class="form-control" name="name">
                      </div>
                      <div class="form-group col-xs-16 col-sm-8 email-field">
                        <input type="email" placeholder="البريد الالكتروني" required="" class="form-control" name="mail">
                      </div>
                      <div class="form-group col-xs-16 col-sm-8">
                        <input type="text" placeholder="الجوال" required="" class="form-control" name="mobile">
                      </div>
                      <div class="form-group col-xs-16 col-sm-8">
                        <input type="text" placeholder="العنوان" required="" class="form-control" name="address">
                      </div>
                      <div class="form-group col-xs-16 col-sm-16">
                        <textarea placeholder="الرسالة" rows="8" class="form-control" name="message">                  
                        </textarea>
                      </div>
                      <div class="form-group col-xs-16 col-sm-8" id="hidden-field">
                        <input type="text" placeholder="الحالة" required="" class="form-control" name="reply_status" value="2">
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="ارسل" name="send" class="btn btn-danger"/>
                    </div>
                  {!! Form::close() !!}
                </div>
                <div class="col-sm-4  adress">
                  <address>
                  <strong>العنوان</strong><br>
                  {{$contact_info->title}}<br>
                  </address>
                  <address>
                  <strong>البريد الالكتروني</strong><br>
                  <a href="mailto:#">{{$contact_info->mail}}</a>
                  </address>
                  <strong>ارقام الهواتف</strong><br>
                  <ul class="list-inline">
                  @if ($phones->count())
                  @foreach ($phones as $phone)
                    <li><a href="#"><span class=""></span>{{$phone->phone}}</a></li><br>
                  @endforeach
                  @endif
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- left sec End --> 
        
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
<script type="text/javascript">
  $('.transfer').hide();
  $('#hidden-field').hide();
</script>
@endsection
@stop 