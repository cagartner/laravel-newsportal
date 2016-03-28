@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 3)
            @extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>تعديل بيانات الحساب الشخصي</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li class="active">تعديل البيانات</li>
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
                                    تعديل بيانات الحساب الشخصي: {{$user->name}}
                                </h3>
                            </div>
                <div class="panel-body">
                    {!! Form::model($user, [$user->id, 'method' => 'POST', 'files'=>true]) !!}
                                  <div class="row">
                                      <div class="col-md-6" style="background-color: rgb(245, 245, 245);padding: 10px;">
                                        <div class="form-group">
                                          <label>الاسم</label><br>
                                          {!! Form::text('name', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                          <label>البريد الالكتروني</label><br>
                                          {!! Form::text('email', null, 
                                              array('class'=>'form-control', 'style'=>'width:100%')) !!}
                                        </div>
                                        <div class="form-group">
                                          <label>كلمة السر</label><br>
                                          <input type="password" name="password" class="form-control" style="width:100%"/>
                                        </div>
                                        <div class="form-group">
                                          <label>تأكيد كلمة السر</label><br>
                                          <input type="password" name="password_confirmation" class="form-control" style="width:100%"/>
                                        </div>
                                        @if (!empty($user->phone))
                                        <div class="form-group">
                                          <label>رقم الجوال</label><br>
                                          <input type="فثءف" name="phone" class="form-control" style="width:100%" value="{{$user->phone}}" />
                                        </div>
                                        @else
                                        <div class="form-group">
                                          <label>رقم الجوال</label><br>
                                          <input type="فثءف" name="phone" class="form-control" style="width:100%" />
                                        </div>
                                        @endif
                                        @if ($user->confirmed == 1)
                                        <div class="form-group">
                                          <input type="checkbox" name="activation" value="checked" checked>
                                          <label>تفعيل العضو</label><br>
                                        </div>
                                        @else
                                        <div class="form-group">
                                          <input type="checkbox" name="activation" value="checked">
                                          <label>تفعيل العضو</label><br>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                        <label class="control-label">
                                                      اسم المجموعة
                                                  </label>
                                                  <select name="group" id="select2_sample4" class="form-control select2">
                                                  @foreach ($groups as $group)
                                                                 @if ($user->group_id == $group->id)
                                                                        <option value="{{$group->id}}" selected>
                                                                            {{$group->name}}
                                                                        </option>
                                                                        @else
                                                                        <option value="{{$group->id}}">
                                                                            {{$group->name}}
                                                                        </option>
                                                                        @endif
                                                    @endforeach
                                                  </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            {!!Form::submit('تعديل',['class'=>'btn btn-default'])!!}
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group" style="float:left;background-color: rgb(245, 245, 245);padding: 10px;">
                                        {!! Form::label('الصورة') !!}
                                        <br>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            @if (!empty($user->basic_photo))
                                                <img src="/img/users/{{ $user->basic_photo }}" alt="..." style="width: 100%; height: 100%;">
                                            @else
                                                <img data-src="holder.js/100%x100%">
                                            @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">اختر صورة</span>
                                                    <span class="fileinput-exists">تغيير</span>
                                                    <input type="file" id="basic_photo" name="basic_photo"  class="upload_photos" value="C:\wamp\www\laravel\wedding\public\img\uploaded/Desert.jpg"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">حذف</a>
                                            </div>
                                        </div>
                                        <br />
                                        <span class="comment-format">الامتدادات المسموح بها: "jpg,jpeg,png,gif" و الحد الاقصى للملف 1000 كيلوبايت</span>
                                        </div>
                                    </div>
                                  </div>
                                        {!!Form::close()!!}
                </div>
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
@section('footer_scripts')
    <link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
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