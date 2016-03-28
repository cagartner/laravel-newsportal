@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 10) 
            @extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>تعديل اعلان</h1>
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
                    <li class="active">تعديل اعلان</li>
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
                                                تعديل اعلان
                                            </h3>
                                            <span class="pull-right">
                                                <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                                <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                            </span>
                                        </div>
                            <div class="panel-body">
                                {!! Form::model($adv, [$adv->id, 'files' => true, 'method' => 'POST']) !!}
                                    <div class="form-group">
                                      <label>العنوان</label><br>
                                      <input type="text" class="form-control" placeholder="العنوان" name="title" value="{{$adv->title}}" />
                                    </div>
                                    
                                    <div class="form-group" style="background-color: #EEEBEB;padding: 10px;">
                                                            {!! Form::label('الصورة الرئيسية') !!}
                                                            <br>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        @foreach($adv->images as $image)
                                                                            <img src="/{{$image->original_size}}" alt="{{$adv->title}}" style="height:100%">
                                                                        @endforeach
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

                                    <div class="form-inline">
                                    <div class="form-group">
                                            <label class="control-label">
                                                تاريخ البدأ
                                            </label>
                                            <input type="text" name="start" class="form-control" id="start" value="{{$adv->start}}">
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label">
                                                تاريخ الانتهاء
                                            </label>
                                            <input type="text" name="end" class="form-control" id="end" value="{{$adv->end}}">
                                        </div>
                                       </div>

                                    <div class="form-group">
                                      <label>قيمة الاعلان</label><br>
                                      <input type="text" class="form-control" placeholder="قيمة الاعلان" name="cost" value="{{$adv->cost}}"/>
                                    </div>

                                    <div class="form-group">
                                      <label>الخصم</label><br>
                                      <input type="text" class="form-control" placeholder="الخصم" name="discount" value="{{$adv->discount}}"/>
                                    </div>

                                    <div class="form-group">
                                                    <label>تعليق</label>
                                                    <textarea class="form-control" name="comment" rows="7" id="comment" >{{$adv->comment}}</textarea>
                                                </div>

                                    <div class="form-group">
                                                            <label>مكان الاعلان</label>
                                                            <select name="position" class="form-control">
                                                                <option value="1" @if ($adv->position == 1) selected @endif>
                                                                    اعلي الرئيسية
                                                                </option>
                                                                <option value="2" @if ($adv->position == 2) selected @endif>
                                                                    العمود الايسر
                                                                </option>
                                                                <option value="3" @if ($adv->position == 3) selected @endif>
                                                                    اسفل الرئيسية
                                                                </option>
                                                            </select>
                                                        </div>

                                    <div class="form-group">
                                        <input type="checkbox" name="status" value="checked" @if ($adv->status == 1) checked @endif>
                                        <label>تفعيل الاعلان</label><br>
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