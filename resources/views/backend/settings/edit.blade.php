@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 11)
            @extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>تعديل البيانات الاساسية</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li class="active">تعديل البيانات الاساسية</li>
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
                                                تعديل البيانات الاساسية
                                            </h3>
                                            <span class="pull-right">
                                                <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                                <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                            </span>
                                        </div>
                            <div class="panel-body">
                                {!! Form::model($settings, [$settings->id, 'files' => true, 'method' => 'POST']) !!}
                                    <div class="form-group">
                                      <label>اسم الموقع</label><br>
                                      <input type="text" class="form-control" placeholder="العنوان" name="name" value="{{$settings->name}}" />
                                    </div>
                                    
                                    <div class="form-group" style="background-color: #EEEBEB;padding: 10px;">
                                                            {!! Form::label('اللوجو') !!}
                                                            <br>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="/{{$settings->logo}}" alt="{{$settings->name}}" style="height:100%">
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

                                    <div class="form-group">
                                            <label class="control-label">
                                                الكلمات المفتاحية
                                            </label>
                                            <input type="text" name="keywords" class="form-control" value="{{$settings->keywords}}">
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">
                                                رئيس التحرير
                                            </label>
                                            <input type="text" name="editor" class="form-control" value="{{$settings->editor}}">
                                    </div>
                                    <div class="form-group" style="background-color: #EEEBEB;padding: 10px;">
                                                            {!! Form::label('Favicon') !!}
                                                            <br>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="/{{$settings->favicon}}" alt="{{$settings->name}}" style="height:100%">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                                <div>
                                                                    <span class="btn btn-default btn-file">
                                                                        <span class="fileinput-new">اختر صورة</span>
                                                                        <span class="fileinput-exists">تغيير</span>
                                                                        <input type="file" id="basic_photo" name="favicon"  class="upload_photos" value="C:\wamp\www\laravel\wedding\public\img\uploaded/Desert.jpg"></span>
                                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">حذف</a>
                                                                </div>
                                                            </div>
                                                            <br />
                                                            <span class="comment-format">الامتدادات المسموح بها: "jpg,jpeg,png,gif" و الحد الاقصى للملف 1000 كيلوبايت</span>
                                    </div>

                                    <div class="form-group">
                                                    <label>الوصف</label>
                                                    <textarea class="form-control" name="description" rows="7">{{$settings->description}}</textarea>
                                                </div>

                                   

                                    <div class="form-group">
                                        {!! Form::submit('تعديل', 
                                          array('class'=>'btn btn-primary')) !!}
                                    </div>
                                {!! Form::close() !!}
                            </div>
                    </div>
                </div>
            </div>
                <!--main content ends-->
                                @endif
                        @if ($view->status == 2 && $view->permission == 11)
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