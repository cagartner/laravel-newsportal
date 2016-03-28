@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 2)
            @extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>تعديل المجموعة</h1>
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
                    <li class="active">تعديل المجموعة</li>
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
                                    تعديل المجموعة {{$group->name}}
                                </h3>
                            </div>
                <div class="panel-body">
                    {!! Form::model($group, [$group->id, 'method' => 'POST']) !!}
                        <div class="form-group">
                            <label>الاسم</label><br>
                            {!! Form::text('name', null, 
                              array('class'=>'form-control')) !!}
                        </div>

                        <div class="form-group">
                            <label>الوصف</label><br>
                            {!! Form::text('description', null, 
                              array('class'=>'form-control')) !!}
                        </div>
                        @if ($mypermissions->count())
                        <div class="form-group">
                                    <label>صلاحيات المجموعة</label><br>
                                    @foreach ($mypermissions as $permission)
                                    @if ($permission->permission == 1) 
                                        <input type="checkbox" name="permission1" value="1" @if ($permission->status == 1) checked @endif> لوحة التحكم<br>
                                    @endif
                                    @if ($permission->permission == 2) 
                                        <input type="checkbox" name="permission2" value="1" @if ($permission->status == 1) checked @endif> المجموعات<br>
                                    @endif
                                    @if ($permission->permission == 3) 
                                        <input type="checkbox" name="permission3" value="1" @if ($permission->status == 1) checked @endif> الاعضاء<br>
                                    @endif
                                    @if ($permission->permission == 4) 
                                        <input type="checkbox" name="permission4" value="1" @if ($permission->status == 1) checked @endif> الاقسام<br>
                                    @endif 
                                    @if ($permission->permission == 5)
                                        <input type="checkbox" name="permission5" value="1"  @if ($permission->status == 1) checked @endif> الاخبار<br>
                                    @endif
                                     @if ($permission->permission == 6) 
                                        <input type="checkbox" name="permission6" value="1"@if ($permission->status == 1) checked @endif> الصفحات<br>
                                    @endif
                                     @if ($permission->permission == 7) 
                                        <input type="checkbox" name="permission7" value="1"@if ($permission->status == 1) checked @endif> القوائم<br>
                                    @endif
                                     @if ($permission->permission == 8) 
                                        <input type="checkbox" name="permission8" value="1"@if ($permission->status == 1) checked @endif> اتصل بنا<br>
                                    @endif
                                     @if ($permission->permission == 9) 
                                        <input type="checkbox" name="permission9" value="1"@if ($permission->status == 1) checked @endif> استطلاعات الرأي<br>
                                    @endif
                                    @if ($permission->permission == 10) 
                                        <input type="checkbox" name="permission10" value="1" @if ($permission->status == 1) checked @endif> الاعلانات<br>
                                    @endif
                                    @if ($permission->permission == 11) 
                                        <input type="checkbox" name="permission11" value="1" @if ($permission->status == 1) checked @endif> الاعدادات العامة<br>
                                    @endif
                                    @if ($permission->permission == 12) 
                                        <input type="checkbox" name="permission12" value="1" @if ($permission->status == 1) checked @endif> التقارير<br>
                                    @endif
                                    @if ($permission->permission == 14) 
                                        <input type="checkbox" name="permission14" value="1" @if ($permission->status == 1) checked @endif> وسائل التواصل الاجتماعي<br>
                                    @endif
                                    @endforeach
                        </div>
                        @else
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
                                        <input type="checkbox" name="permission14" value="1"> وسائل التواصل الاجتماعي<br>
                        </div>
                        @endif
                        <div class="form-group">
                            {!! Form::submit('تعديل', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
@endif
                        @if ($view->status == 2 && $view->permission == 2)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
@stop