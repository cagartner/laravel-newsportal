@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 3)
			@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>قائمة الاعضاء</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li class="active">الاعضاء</li>
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
				                        بحث الاعضاء
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
					                            اسم المجموعة
					                        </label>
					                        <select name="name" id="select2_sample4" class="form-control select2">
					                        <option value="">
						                        --اختر--
						                    </option>
					                        @if ($groups_names->count())
					                        	@foreach($groups_names as $view)
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
					                    @if (!empty($_GET['user_name']))
						                    <div class="form-group">
						                    	<label class="control-label">
						                            اسم العضو
						                        </label>
						                        <input type="text" name="user_name" class="form-control" value="{{$_GET['user_name']}}">
						                    </div>
					                    @else
					                    	<div class="form-group">
						                    	<label class="control-label">
						                            اسم العضو
						                        </label>
						                        <input type="text" name="user_name" class="form-control">
						                    </div>
					                    @endif
					                    @if (!empty($_GET['phone']))
					                    <div class="form-group">
					                    	<label class="control-label">
					                            رقم الجوال
					                        </label>
					                        <input type="text" name="phone" class="form-control" value="{{$_GET['phone']}}">
					                    </div>
					                    @else
					                    <div class="form-group">
					                    	<label class="control-label">
					                            رقم الجوال
					                        </label>
					                        <input type="text" name="phone" class="form-control">
					                    </div>
					                    @endif
					                    @if (!empty($_GET['created_at']))
					                    <div class="form-group" style="display:none;">
					                    	<label class="control-label">
					                            تاريخ الانشاء
					                        </label>
					                        <input type="text" name="created_at" class="form-control" id="created_at" value="{{$_GET['created_at']}}" style="width: 170px;">
					                    </div>
					                    @else
					                    <div class="form-group" style="display:none;">
					                    	<label class="control-label">
					                            تاريخ الانشاء
					                        </label>
					                        <input type="text" name="created_at" class="form-control" id="created_at" style="width: 170px;">
					                    </div>
					                    @endif
					                    @if (!empty($_GET['activation']))
					                    <div class="form-group">
					                        <label class="control-label">
					                            حالة التفعيل
					                        </label>
					                        <select name="activation" class="form-control select2" style="width: 185px;margin-left:70px;">
					                        <option value="">
						                        --اختر--
						                    </option>
							                <option value="1" @if ($_GET['activation'] == 1) selected @endif>
							                    مفعل
							                </option>
							                <option value="2" @if ($_GET['activation'] == 2) selected @endif>
							                    غير مفعل
							                </option>
					                        </select>
					                    </div>
					                    @else
					                    <div class="form-group">
					                        <label class="control-label">
					                            حالة التفعيل
					                        </label>
					                        <select name="activation" class="form-control select2" style="width: 185px;margin-left:70px;">
					                        <option value="">
						                        --اختر--
						                    </option>
							                <option value="1">
							                    مفعل
							                </option>
							                <option value="2">
							                    غير مفعل
							                </option>
					                        </select>
					                    </div>
					                    @endif
					                    <div class="form-group" style="margin-top: 4px;">
					                        <input type="submit" name="search" value="بحث" class="button button-pill button-flat">
					                    </div>
					                    <div class="form-group" style="margin-top: 4px;">
					                        <a href="/admin/admins"><input type="submit" name="reset" value="فرغ" class="button button-pill button-flat"></a> 
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
                                    	استعراض الاعضاء
                                	</div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($groups->count())
                                	@if ($users->count())
	                                    <thead>
	                                        <tr>
	                                        	<th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="float:right;">
                                                </th>
                                                <th>الكود</th>
                                                <th>الصورة</th>
	                                            <th>الاسم</th>
	                                            <th>رقم الجوال</th>
	                                            <th>البريد الالكتروني</th>
	                                            <th>المجموعة</th>
	                                            <th>تاريخ الانشاء</th>
	                                            <th>حالة التفعيل</th>	
	                                            <th>
	                                                العمليات
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                    	@foreach ($groups as $view)
                                    		@foreach ($users as $user)
                                    		@if ($user->group_id == $view->id)
	                                        <tr>
	                                        	<td>
                                                    <input type="checkbox" name="check_list[{{$user->id}}]" class="check_list" value="{{$user->id}}">
                                                </td>
                                                <td>{{$user->id}}</td>
                                                <td><img src="/img/users/{{$user->basic_photo}}" style="width:50px;height:40px;"></td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$view->name}}</td>
                                                <td>{{$user->created_at}}</td>
                                                <td>
                                                	@if ($user->confirmed == 1)
                                                		<span class="label label-sm label-success">مفعل</span>
                                                	@else
                                                		<span class="label label-sm label-warning">غير مفعل</span>
                                                	@endif
                                                </td>
	                                            <td style="width: 15%;">
	                                            	<a href="http://localhost:8000/admin/report/advertisements?title=&status=&start=&user_id={{$user->id}}"><i class="fa fa-fw fa-tasks"></i>تقرير الاخبار</a><br>
	                                            	<a href="/admin/report/advertisements?title=&status=&created_at=&user_id={{$user->id}}"><i class="fa fa-fw fa-tasks"></i>تقرير الاعلانات</a><br>
	                                                <a href="/admin/admins/{{$user->id}}/edit"><i class="fa fa-fw fa-edit"></i>تعديل</a><br>
	                                                <a href="/admin/admins/{{$user->id}}/delete"><i class="fa fa-trash-o"></i>حذف</a>
	                                            </td>
	                                        </tr>
	                                        @endif
	                                        @endforeach
	                                    @endforeach
	                                @endif
	                                @if (!($users->count()))
	                                	<div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                @if (count($users))
		                            <div class="form-group">
		                                <input type="submit" name="delete" value="مسح" class="btn btn-primary">
		                            </div>
		                        @endif
		                        @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $groups->count() }} مجموعة /  إجمالي : {{ $users->count() }} عضو </div>
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
	                                {!! $users->render() !!}
	                            </ul>
	                        </nav>                        
	                    </div>
	                </div>
	            </div>
	                            @endif
                        @if ($view->status == 2 && $view->permission == 3)
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
					<style type="text/css">
						.form-group{
							padding-bottom: 5px;
						}
					</style>
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