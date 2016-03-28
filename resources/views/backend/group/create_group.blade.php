@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 2)

			@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>اضافة مجموعة جديدة</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="/admin/groups">المجموعات</a>
                    </li>
                    <li class="active">اضافة مجموعة جديدة</li>
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
			                                    اضافة مجموعة جديدة
			                                </h3>
			                                <span class="pull-right">
			                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
			                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
			                                </span>
			                            </div>
			                <div class="panel-body">
			                    {!! Form::open(array('method' => 'post')) !!}
			                        <div class="form-group">
			                          <label>الاسم</label><br>
			                          <input type="text" class="form-control" placeholder="اسم المجموعة" name="name" />
			                        </div>

			                        <div class="form-group">
			                          <label>الوصف</label><br>
			                          <input type="text" class="form-control" placeholder="وصف مختصر للمجموعة" name="description" />
			                        </div>
			                        <div class="form-group">
			                        <label>صلاحيات المجموعة</label><br>
			                        	<input type="checkbox" name="permission1" value="1"> لوحة التحكم<br>
										<input type="checkbox" name="permission2" value="1"> المجموعات<br>
										<input type="checkbox" name="permission3" value="1"> الاعضاء<br>
										<input type="checkbox" name="permission4" value="1"> الاقسام<br>
										<input type="checkbox" name="permission5" value="1"> الاخبار<br>
										<input type="checkbox" name="permission6" value="1"> الصفحات<br>
										<input type="checkbox" name="permission7" value="1"> القوائم<br>
										<input type="checkbox" name="permission8" value="1"> اتصل بنا<br>
										<input type="checkbox" name="permission9" value="1"> استطلاعات الرأي<br>
										<input type="checkbox" name="permission10" value="1"> الاعلانات<br>
										<input type="checkbox" name="permission11" value="1"> الاعدادات العامة<br>
										<input type="checkbox" name="permission12" value="1"> التقارير<br>
										<input type="checkbox" name="permission13" value="1"> الاعمدة و الصناديق<br>
										<input type="checkbox" name="permission14" value="1"> وسائل التواصل الاجتماعي<br>
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
                        @if ($view->status == 2 && $view->permission == 2)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
                @stop
                @section('footer_scripts')
					<script src="{{ asset('assets/backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
				@stop
            	@section('header_styles')
					<link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
				@stop