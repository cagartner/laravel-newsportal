@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 10) 
			@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>قائمة الاعلانات</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li class="active">الاعلانات</li>
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
				                        بحث الاعلانات
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
					                            عنوان الاعلان
					                        </label>
					                        <input name="title" type="text" class="form-control" style="width: 450px !important;" @if (!empty($_GET['title']))  value="{{$_GET['title']}}" @endif>
					                    </div>
					                    <div class="form-group">
					                        <label class="control-label">
					                            حالة التفعيل
					                        </label>
					                        <select name="status" id="select2_sample4" class="form-control select2" style="width: 250px;">
					                        <option value="">
						                        --اختر--
						                    </option>
						                    @if (!empty($_GET['status']))
						                        		@if ($_GET['status'] == 1)
							                            <option value="1" selected>
							                                مفعل
							                            </option>
							                            <option value="2">
							                                غير مفعل
							                            </option>
							                        	@else
							                        	<option value="1">
							                                منشور
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
					                    @if (!empty($_GET['created_at']))
					                    <div class="form-group" style="margin-top:10px;display:none;">
					                    	<label class="control-label">
					                            تاريخ البدأ
					                        </label>
					                        <input type="text" name="start" class="form-control" id="created_at" value="{{$_GET['start']}}" style="width: 170px;">
					                    </div>
					                    @else
					                    <div class="form-group" style="margin-top:10px;display:none;">
					                    	<label class="control-label">
					                            تاريخ البدأ
					                        </label>
					                        <input type="text" name="start" class="form-control" id="created_at" style="width: 170px;">
					                    </div>
					                    @endif
					                    <div class="form-group" style="margin-top:10px;">
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
                                    	استعراض الاعلانات
                                	</div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($adv->count())
	                                    <thead>
	                                        <tr>
	                                        	<th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="float:right;">
                                                </th>
                                                <th>الكود</th>
                                                <th>عنوان الاعلان</th>
	                                            <th>الموقع</th>
	                                            <th>تاريخ البدأ</th>
	                                            <th>تاريخ الانتهاء</th>
	                                            <th>انشئ بواسطة</th>
	                                            <th>الحالة</th> 
	                                            <th>تاريخ الانشاء</th>
	                                            <th>تاريخ اخر تحديث</th>
	                                            <th>حالة التجديد</th>
	                                            <th>
	                                                العمليات
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                    	@foreach ($adv as $view)
	                                        <tr>
	                                        	<td>
                                                    <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                                </td>
                                                <td>{{$view->id}}</td>
                                                <td>{{$view->title}}</td>
                                                <td>
                                                @if ($view->position == 1)
                                                	<p style="color:#337AB7;">اعلى الرئيسية</p>
                                                @elseif ($view->position == 2)
                                                	<p style="color:rgb(186, 47, 47);">العمود الايسر</p>
                                                @elseif ($view->position == 3)
                                                	<p style="color:#01BC8C;">اسفل الرئيسية</p>
                                                @endif
                                                </td>
                                                <td>{{$view->start}}</td>
                                                <td>{{$view->end}}</td>
                                                <td>
                                                @foreach($users as $user)
                                                	@if ($user->id == $view->user_id)
                                                		{{$user->name}}
                                                	@endif
                                                @endforeach
                                                </td>
                                                <td>
                                                	@if ($view->status == 1)
                                                		<span class="label label-sm label-success">مفعل</span>
                                                	@else
                                                		<span class="label label-sm label-warning">غير مفعل</span>
                                                	@endif
                                                </td>
                                                <td>
	                                               {{$view->created_at}}
                                                </td>
                                                <td>
	                                               {{$view->updated_at}}
                                                </td>
                                                <td>
	                                               @if ($view->renewal == 1)
                                                		<span class="label label-sm label-success">مجدد</span>
                                                	@else
                                                		<span class="label label-sm label-warning">الاصل</span>
                                                	@endif
                                                </td>
	                                            <td>
		                                            @if ($today > $view->end)
		                                            	<a href="/admin/advertisements/{{$view->id}}/renew"><i class="fa fa-fw fa-plus-circle"></i>تجديد</a><br> 
		                                            @endif
	                                                <a href="/admin/advertisements/{{$view->id}}/edit"><i class="fa fa-fw fa-edit"></i>تعديل</a><br> 
	                                                <a href="/admin/advertisements/{{$view->id}}/delete"><i class="fa fa-trash-o"></i>حذف</a>
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                @endif
	                                @if (!($adv->count()))
	                                	<div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                @if ($adv->count())
		                            <div class="form-group">
		                                <input type="submit" name="delete" value="مسح" class="btn btn-primary">
		                            </div>
		                        @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $adv->count() }} اعلان </div>
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
	                                {!! $adv->render() !!}
	                            </ul>
	                        </nav>                        
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