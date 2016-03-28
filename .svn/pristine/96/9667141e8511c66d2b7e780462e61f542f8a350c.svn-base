@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 10) 
			@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>تجديد الاعلان</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="/admin/advertisements">الاعلانات</a>
                    </li>
                    <li class="active">تجديد الاعلان</li>
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
			                                    تجديد الاعلان
			                                </h3>
			                                <span class="pull-right">
			                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
			                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
			                                </span>
			                            </div>
			                <div class="panel-body">
			                    {!! Form::open(array('method' => 'post', 'files'=>true)) !!}
                                    <div class="form-inline">
                                    <div class="form-group">
					                    	<label class="control-label">
					                            تاريخ البدأ
					                        </label>
					                        <?php 
					                        	$Date = $old_adv->end;
												$Date = date('Y-m-d', strtotime($Date. ' + 1 days'));
					                        ?>
					                        <input type="text" name="start" class="form-control" id="start" value="{{$Date}}">
					                    </div>
					                   <div class="form-group">
					                    	<label class="control-label">
					                            تاريخ الانتهاء
					                        </label>
					                        <input type="text" name="end" class="form-control" id="end">
					                    </div>
					                   </div>

					                <div class="form-group">
			                          <label>قيمة الاعلان</label><br>
			                          <input type="text" class="form-control" placeholder="قيمة الاعلان" name="cost" />
			                        </div>

			                        <div class="form-group">
			                          <label>الخصم</label><br>
			                          <input type="text" class="form-control" placeholder="الخصم" name="discount" />
			                        </div>

			                        <div class="form-group">
                                                    <label>تعليق</label>
                                                    <textarea class="form-control" name="comment" rows="7" id="comment"></textarea>
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
			@endif
                        @if ($view->status == 2 && $view->permission == 10)
            @section('content')     
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
                <!--main content ends-->
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
					  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
					  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
					  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
					  <link rel="stylesheet" href="/resources/demos/style.css">
					    <script>
					  $(function() {
					    $( "#start" ).datepicker();
					    $( "#end" ).datepicker();
					  });
					  </script>
				@stop
            	@section('header_styles')
            		<link rel="stylesheet" href="{{ asset('assets/backend/vendors/Buttons-master/css/buttons.css') }}" />
					<link rel="stylesheet" href="{{ asset('assets/backend/css/pages/advbuttons.css') }}" />
					<link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
					
					  <link rel="stylesheet" href="/resources/demos/style.css">
					   <style>    
					        img.resizeme {
					            height: 100px;
					            width: 150px;

					        }
					        .break_coll{
					            display: none;
					        }
					        .comment-format{
					            padding: 3px;
					            background-color: #f5f5f5;
					            color: black;            
					            font-size: 12px;
					        }
					    </style> 
				@stop