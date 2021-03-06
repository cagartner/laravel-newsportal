@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 9)
			@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>اضافة استطلاع رأي</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="/admin/opinions">استطلاعات الرأي</a>
                    </li>
                    <li class="active">اضافة استطلاع رأي</li>
                </ol>
            @stop
            <!--section ends-->
            @section('content')
                <!--main content-->
            <div class="row">
			    <div class="col-md-12">
			         <div class="panel panel-primary" id="hidepanel1">
			                            <div class="panel-heading">
			                                <h3 class="panel-title">
			                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
			                                    اضافة استطلاع رأي
			                                </h3>
			                                <span class="pull-right">
			                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
			                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
			                                </span>
			                            </div>
			                <div class="panel-body">
			                    {!! Form::open(array('method' => 'post')) !!}
			                        <div class="form-group">
			                          <label>السؤال</label><br>
			                          <input type="text" class="form-control" placeholder="السؤال" name="question" />
			                        </div>

                                    <div class="form-group">
                                            {!! Form::label('الخيارات') !!}
                                            <div id="main">
                                                <input type='text' name='option1' class='form-control'/><br>
                                            </div>
                                            <input type="button" id="abc" value="اضافة المزيد" />
                                            <input type='text' name='counter' id="counter" />
                                        </div>

                                    <div class="form-group">
			                        	<input type="checkbox" name="status" value="checked" checked>
                                        <label>تفعيل الاستطلاع</label><br>
                                    </div>

			                        <div class="form-group">
			                            {!! Form::submit('حفظ', 
			                              array('class'=>'btn btn-primary')) !!}
			                        </div>
			                    {!! Form::close() !!}
			                </div>
			        </div>
			    </div>
			</div>
                <!--main content ends-->
                                @endif
                        @if ($view->status == 2 && $view->permission == 9)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
                @stop
                @section('footer_scripts')
					<script src="{{ asset('assets/backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
					<script type="text/javascript">
					    var i = 2;
					    $("#abc").click(function() {
					        var input = "<input type='text' name='option"+i+"' class='form-control'/><br>";
					        $("#main").append(input);
					        i++;
					    });
					    $("#abc").click(function() {
					        var counter = document.getElementById('main').getElementsByTagName('input').length;
					        $('#counter').val(counter);
					    });
					    $('#counter').hide();
					</script>
				@stop
            	@section('header_styles')
					<link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
				@stop