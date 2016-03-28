@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 4)
			@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>قائمة الاقسام</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li class="active">الاقسام</li>
                </ol>
            @stop
            <!--section ends-->
            @section('content')
            	<div class="row">
				    <div class="col-md-12">
				        <div class="panel panel-success" id="hidepanel1">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                    <i class="fa fa-fw fa-filter"></i>
				                        بحث الاقسام
				                    </h3>
				                    <span class="pull-right">
				                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
				                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
				                    </span>
				                </div>
				                <div class="panel-body">
					                {!! Form::open(array('method' => 'post', 'class' => 'form-inline')) !!}
						            
					            		<div class="form-group">
					                        <label class="control-label">
					                            اسم القسم
					                        </label>
					                        <select name="name" id="select2_sample4" class="form-control select2">
					                        <option value="">
						                        --اختر--
						                    </option>
					                        @if ($sections_names->count())
					                        	@foreach($sections_names as $view)
						                        	@if (!empty($_GET['name']))
						                        		@if ($_GET['name'] == $view->name)
							                            <option value="{{$view->id}}" selected>
							                                {{$view->name}}
							                            </option>
							                        	@else
							                        	<option value="{{$view->name}}">
							                                {{$view->name}}
							                            </option>
							                           	@endif
							                        @else
							                        	<option value="{{$view->name}}">
							                                {{$view->name}}
							                            </option>
							                        @endif
					                            @endforeach
					                        @endif
					                        </select>
					                    </div>
					                    <div class="form-group">
					                        <label class="control-label">
					                            حالة التفعيل
					                        </label>
					                        <select name="activation" id="select2_sample4" class="form-control select2">
					                        <option value="">
						                        --اختر--
						                    </option>
						                        	@if (!empty($_GET['activation']))
						                        		@if ($_GET['activation'] == 1)
							                            <option value="1" selected>
							                                مفعل
							                            </option>
							                            <option value="2">
							                                غير مفعل
							                            </option>
							                        	@else
							                        	<option value="1">
							                                مفعل
							                            </option>
							                            <option value="2" selected>
							                                غير مفعل
							                            </option>
							                           	@endif
							                        @else
							                        	<option value="1">
							                                مفعل
							                            </option>
							                            <option value="2">
							                                غير مفعل
							                            </option>
							                        @endif
					                        </select>
					                    </div>
					                    <div class="form-group">
					                        <input type="submit" name="search" value="بحث" class="button button-pill button-flat">
					                    </div>
	                			</div>
	                	</div>
	                </div>
	            </div>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                    <div class="caption">
                                    	<i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    	استعراض الاقسام
                                	</div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($sections->count())
	                                    <thead>
	                                        <tr>
	                                        	<th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="float:right;">
                                                </th>
                                                <th>الكود</th>
	                                            <th>الاسم</th>
	                                            <th>حالة التفعيل</th>
	                                            <th>عدد الاخبار</th>
	                                            <th>
	                                                العمليات
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                    	@foreach ($sections as $view)
	                                        <tr>
	                                        	<td>
                                                    <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                                </td>
                                                <td>{{$view->id}}</td>
                                                <td>{{$view->name}}</td>
                                                <td>
                                                	@if ($view->activation == 1)
                                                	<span class="label label-sm label-success">مفعل</span>
                                                	@else
                                                		<span class="label label-sm label-warning">غير مفعل</span>
                                                	@endif
                                                </td>
                                                <td>
	                                                @if (!empty($news_sections))
	                                                	@foreach($news_sections as $nsection)
	                                                		@if ($view->id == $view->id)
	                                                			{{$news_sections[$view->id]}}
	                                                		@endif
	                                                		<?php break; ?>
	                                                	@endforeach
	                                                @endif
                                                </td>
	                                            <td>
	                                                <a href="/admin/sections/{{$view->id}}/edit"><i class="fa fa-fw fa-edit"></i>تعديل</a> - 
	                                                <a href="/admin/sections/{{$view->id}}/delete"><i class="fa fa-trash-o"></i>حذف</a>
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                @endif
	                                @if (!($sections->count()))
	                                	<div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                @if ($sections->count())
		                            <div class="form-group">
		                                <input type="submit" name="delete" value="مسح" class="btn btn-primary">
		                            </div>
		                        @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $sections->count() }} قسم </div>
                            </div>
                        </div>
                    </div>
                </div>           
                {!! Form::close() !!}
                <div class="row">
	                <div class="col-md-12">
	                    <div class="product-pagination text-center">
	                        <nav>
	                            <ul class="pagination">
	                                {!! $sections->render() !!}
	                            </ul>
	                        </nav>                        
	                    </div>
	                </div>
	            </div>
	                            @endif
                        @if ($view->status == 2 && $view->permission == 4)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
   				@stop
   				@section('header_styles')
   					<link rel="stylesheet" href="{{ asset('assets/backend/vendors/Buttons-master/css/buttons.css') }}" />
					<link rel="stylesheet" href="{{ asset('assets/backend/css/pages/advbuttons.css') }}" />
   				@stop
   				@section('footer_scripts')
                	<script>
						    $('#checkall').change(function(event) {
						        if(this.checked) {
						            $('.check_list').each(function() {
						                this.checked = true;
						            });
						        }
						        else{
						            $('.check_list').each(function() {
						                this.checked = false;
						            });        
						        }
						    });
					</script>    
   				@stop