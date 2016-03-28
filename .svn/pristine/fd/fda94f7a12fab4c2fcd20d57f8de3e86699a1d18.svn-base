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
<style type="text/css">
  div.col-sm-5.hidden-xs.right-sec{
    margin-top: -45px !important;
  }
</style>
@endsection
@section('content')
  <!-- sticky header end --> 
  <!-- bage header Start -->
  <div class="container">
    <div class="page-header">
      <h1>استطلاعات الرأي </h1>
      <ol class="breadcrumb">
        <li><a href="/home">الرئيسية</a></li>
        <li class="active">استطلاعات الرأي </li>
      </ol>
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
          {!! Form::open(array('method' => 'post')) !!}
          @if ($opinions->count())
          @foreach ($opinions as $view)
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1"><span class="ion-ios7-help icon danger"></span> {{$view->question}}  </a> </h4>
                </div>
                <div id="collapse-1" class="panel-collapse collapse in">
                  <div class="panel-body">  
                    @if ($view->options->count())
                      @foreach($view->options as $option)
                        <input type="radio" name="radio" value="{{$option->id}}"> {{$option->option}}<br>
                      @endforeach
                      <div class="form-group">
                          <input type="submit" name="submit" value="تصويت" class="btn btn-primary" style="background-color:#3D566E;" />
                      </div>
                    @endif
                    @if ($view->options->count())
                      <?php $total_votes = 0; ?>
                      @foreach($view->options as $option)
                      <?php $total_votes = $total_votes + $option->votes; ?>
                        {{$option->option}}: {{$option->votes}}
                      @endforeach
                      مجموع التصويت: {{$total_votes}}
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            {!! Form::close() !!}
          </div>
          <div class="row">
                  <div class="col-md-12">
                      <div class="product-pagination text-center">
                          <nav>
                              <ul class="pagination">
                                  {!! $opinions->render() !!}
                              </ul>
                          </nav>                        
                      </div>
                  </div>
              </div>
        </div>
        <!-- left sec End --> 
        <!-- right sec Start -->
          @include('frontend.blocks.rightsidebar')
        <!-- Right Sec End --> 
      </div>
    </div>
  </section>
  <!-- Data End --> 

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
@endsection
@stop 