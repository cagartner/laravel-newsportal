@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 5)
             @extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>اضافة خبر جديد</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="/admin/news">الاخبار</a>
                    </li>
                    <li class="active">اضافة خبر جديد</li>
                </ol>
            @endsection
            <!--section ends-->
            @section('content')
                <!--main content-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    اضافة خبر جديد
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <!--main content-->
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                                        {!! Form::open(array('method' => 'post', 'files'=>true, 'class'=>'form-wizard')) !!}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <h1 class="hidden-xs">البيانات الاساسية</h1>
                                            <section>
                                            <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group" style="background-color: #EEEBEB;padding: 10px;border: 1px solid;">
                                                            {!! Form::label('الصورة الرئيسية') !!}
                                                            <br>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="/img/images.jpg" alt="..."></div>
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
                                            <div class="col-md-8">
                                                <h2 class="hidden">&nbsp;</h2>
                                                <div class="form-group">
                                                    <label>العنوان</label>
                                                    <input id="userName" name="title" type="text" placeholder="عنوان الخبر" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>الملخص</label>
                                                    <input name="summary" type="text" placeholder="ملخص الخبر" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                            <label>حالة الخبر</label>
                                                            <select name="status" class="form-control">
                                                                <option value="1">
                                                                    منشور
                                                                </option>
                                                                <option value="2">
                                                                    غير منشور
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>المؤلف</label>
                                                            <input name="author" type="text" class="form-control">
                                                        </div>
                                            </div>
                                            </div>
                                                <div class="form-group">
                                                    <label>نص الخبر</label>
                                                    <textarea class="form-control" name="news_subject" rows="7" id="news_subject"></textarea>
                                                </div>
                                                <script>
                                                   CKEDITOR.replace('news_subject');
                                                </script>
                                                <div class="form-group">
                                                    <input type="checkbox" name="publish" value="checked"> <b>نشر الخبر على الفيس بوك و تويتر</b>
                                                </div>

                                            </section>
                                            <h1 class="hidden-xs">مميزات الخبر</h1>
                                            <section>
                                                <h2 class="hidden">&nbsp;</h2>
                                                <div class="form-group">
                                                    <label>مميزات الخبر</label><br>
                                                    <input type="checkbox" name="1" value="checked"> <b>وضع الخبر ضمن الاخبار الهامة</b><br>
                                                    <input type="checkbox" name="2" value="checked"> <b>وضع الخبر ضمن الاخبار العاجلة</b><br>
                                                    <input type="checkbox" name="3" value="checked"> <b>عرض الخبر في الشريط الاخباري</b><br>
                                                    <input type="checkbox" name="4" value="checked"> <b>وضع الخبر ضمن الاحداث الهامة</b><br>
                                                    <input type="checkbox" name="5" value="checked"> <b>ارسال اشعار بالخبر</b><br>
                                                    <input type="checkbox" name="6" value="checked"> <b>ارسال SMS للمشتركين بالخدمة الاخبارية</b><br>
                                                </div>
                                                <div class="form-group">
                                                    <label>تميز الخبر باعتباره</label>
                                                    <select name="advantage" class="form-control">
                                                        <option value="">
                                                            --اختر--
                                                        </option>
                                                        <option value="1">
                                                            تغطية
                                                        </option>
                                                        <option value="2">
                                                            انفراد
                                                        </option>
                                                        <option value="3">
                                                            بالفيديو
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>التعليقات</label>
                                                    <select name="comments" class="form-control">
                                                        <option value="1">
                                                            مسموح
                                                        </option>
                                                        <option value="2">
                                                            غير مسموح
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>الاقسام</label><br>
                                                    @foreach ($sections as $section)
                                                        <input type="checkbox" name="{{$section->id}}" value="checked"> <b>{{$section->name}}</b><br>
                                                    @endforeach
                                                </div>
                                                </section>
                                            <h1 class="hidden-xs">البوم الصور</h1>
                                            <section>
                                                <h2 class="hidden">&nbsp;</h2>
                                                <div class="form-group">
                                                    <label>اسم الالبوم</label>
                                                    <input name="pablum_name" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>المصور</label>
                                                    <input name="pablum_photographer" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>ملخص الالبوم</label>
                                                    <input name="pablum_summary" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>موضوع الالبوم</label>
                                                    <textarea class="form-control" name="pablum_subject" id="pablum_subject" rows="7"></textarea>
                                                </div>
                                                <script>
                                                   CKEDITOR.replace('pablum_subject');
                                                </script>
                                                <div class="form-group">
                                                    {!! Form::label('الصور') !!}<br>
                                                    <div class="photos_block">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="/img/images.jpg" alt="..." style="width: 100%;height: 100%;">
                                                        </div>
                                                    </div>
                                                    <div id="selectedFiles"></div>
                                                    <input type="file" id="files" name="files[]" multiple accept="image/*" class="upload_photos" style="clear: both;">
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="palbum_publish_on_home" value="checked"> <b>نشر الالبوم في الصفحة الرئيسية</b><br>
                                                </div>
                                                </section>

                                            <h1>البوم الفيديو</h1>
                                            <section>
                                                <div class="form-group">
                                                    <label>اسم الالبوم</label>
                                                    <input name="vablum_name" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>المصور</label>
                                                    <input name="vablum_photographer" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>ملخص الالبوم</label>
                                                    <input name="vablum_summary" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>موضوع الالبوم</label>
                                                    <textarea class="form-control" name="vablum_subject" id="vablum_subject" rows="7"></textarea>
                                                </div>
                                                <script>
                                                   CKEDITOR.replace('vablum_subject');
                                                </script>
                                                <div class="form-group">
                                                        <label>الفيديوهات</label>
                                                        <div id="add-more-videos">
                                                            <input name="vablum_videos_1" type="text" class="form-control first_video" style="width:95%;" placeholder="اضف الفيديو">
                                                            <input type="button" class="close_more_videos" value="X">
                                                        </div>
                                                </div>
                                                <div class="form-group" style="margin-top: 10px;">
                                                    <input type="button" name="add_more" class="btn btn-primary add_more_btn" value="اضافة المزيد" />
                                                    <input type='text' name='counter' id="counter" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="valbum_publish_on_home" value="checked"> <b>نشر الالبوم في الصفحة الرئيسية</b><br>
                                                </div>
                                            </section>

                                        <!-- END FORM WIZARD WITH VALIDATION --> </div>

                                </div>
                                <!--main content end--> </div>
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                        اضافة الهاش تاج
                                    </h3>
                                    <span class="pull-right clickable">
                                        <i class="glyphicon glyphicon-chevron-up"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            @if ($tags->count())
                                                @foreach($tags as $tag)
                                                    <div class="display-tags" style="margin-right:5px;padding:3px;">{{$tag->tags}}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="single-append-radio" class="control-label">
                                                     هاش تاج موجود
                                                </label>
                                                    <div class="input-group select2-bootstrap-prepend">
                                                        <span class="input-group-addon">
                                                            <input type="radio" class="chk"></span>
                                                            <select name="auto_tags[]" id="single-append-radio" class="form-control select2-allow-clear" multiple>
                                                                <option value="">--اختر--</option>
                                                                @if ($tags->count())
                                                                    @foreach($tags as $tag)
                                                                        <option value="{{$tag->tags}}">{{$tag->tags}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label>هاش تاج جديد</label>
                                                    <input name="new_tag" type="text" placeholder="هاش تاج جديد" class="form-control">
                                                    <span class='comment-span'>اضف الهاش تاج مسبوق بالرمز #</span>
                                            </div>
                                        </div>
                                    </div>                                                
                                </div>
                        </div>
                    </div>
                </div>
                                        {!! Form::close() !!}
                                                        @endif
                        @if ($view->status == 2 && $view->permission == 5)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
                @endsection
                @section('footer_scripts')
                    <script src="{{ asset('assets/backend/vendors/ckeditor-4/ckeditor.js') }}"></script>

                    <!-- begining of page level js -->
                    <script type="text/javascript" src="{{ asset('assets/backend/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script>
                    <script  src="{{ asset('assets/backend/vendors/wizard/jquery-steps/js/additional-methods.min.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('assets/backend/vendors/wizard/jquery-steps/js/wizard.js') }}"></script>
                    <script src="{{ asset('assets/backend/vendors/wizard/jquery-steps/js/jquery.steps.js') }}"></script>
                    <script src="{{ asset('assets/backend/vendors/wizard/jquery-steps/js/form_wizard.js') }}"></script>
                    <script src="{{ asset('assets/backend/js/pages/formwizard.js') }}"></script>
                    <!-- end of page level js -->
                        <script src="{{ asset('assets/backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
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
            background-color: #EBEBEB;
            color: black;            
            font-size: 12px;
        }
        textarea{
            display: block !important;
        }
        .comment-span{
            font-size: smaller;
            color: rgb(66, 139, 202);
        }
        $( "ul" ).accordion({ autoHeight: false });
    </style>
    <script>
        var selDiv = "";
            
        document.addEventListener("DOMContentLoaded", init, false);
        
        function init() {
            document.querySelector('#files').addEventListener('change', handleFileSelect, false);
            selDiv = document.querySelector("#selectedFiles");
        }
            
        function handleFileSelect(e) {
            
            if(!e.target.files || !window.FileReader) return;

            selDiv.innerHTML = "";
            var i = 0;
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            filesArr.forEach(function(f) {
                var f = files[i];
                if(!f.type.match("image.*")) {
                    return;
                }

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.photos_block').hide();
                    $('.break_coll').show();
                    var html = "<div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 200px; max-height: 150px;float:right;'><img class='resizeme' src=\"" + e.target.result + "\">" + f.name + "<br clear=\"left\"/></div>";
                    selDiv.innerHTML += html;
                }
                reader.readAsDataURL(f); 
                i++;
            });
            
        }
    </script>
    <script type="text/javascript">
            //get the input and UL list
        var input = document.getElementById('filesToUpload');
        var list = document.getElementById('fileList');

        //empty list for now...
        while (list.hasChildNodes()) {
            list.removeChild(ul.firstChild);
        }

        //for every file...
        for (var x = 0; x < input.files.length; x++) {
            //add to list
            var li = document.createElement('li');
            li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
            list.append(li);
        }
    </script>

                @endsection
                @section('header_styles')
                    <link href="{{ asset('assets/backend/vendors/wizard/jquery-steps/css/wizard.css') }}" rel="stylesheet" >
                    <link href="{{ asset('assets/backend/vendors/wizard/jquery-steps/css/jquery.steps.css') }}" rel="stylesheet" >
                    <style type="text/css">
                        textarea.form-control{
                            height: 1px !important;
                        }
                        .wizard-inline > .content{
                            min-height: 105em;
                        }
                        b{
                            color: #418BCA;
                        }
                        input.close_more_videos{
                            display: inline-block;
                            box-sizing: content-box;
                            float: left;
                            z-index: auto;
                            width: 20px;
                            height: 22px;
                            position: relative;
                            cursor: default;
                            opacity: 1;
                            margin-right: 5px;
                            padding: 0px;
                            overflow: visible;
                            border: medium none;
                            border-radius: 1em;
                            color: #fff;
                            text-overflow: clip;
                            background: #78A5E0 none repeat scroll 0% 0%;
                            box-shadow: none;
                            text-shadow: none;
                            transition: none 0s ease 0s;
                            transform: none;
                            transform-origin: 50% 50% 0px;
                            padding: 2px;
                            margin-top: -30px;
                        }
                    </style>
                @endsection


@section('autocomplete1')
    <!-- Bootstrap core CSS -->
    <!-- jQuery UI CSS -->
    <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
    <!-- Bootstrap styling for Typeahead -->
    <link href="{{ asset('assets/tags/dist/css/tokenfield-typeahead.css') }}" type="text/css" rel="stylesheet">
    <!-- Tokenfield CSS -->
    <link href="{{ asset('assets/tags/dist/css/bootstrap-tokenfield.css') }}" type="text/css" rel="stylesheet">
    <!-- Docs CSS -->
    <link href="{{ asset('assets/tags/docs-assets/css/pygments-manni.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/tags/docs-assets/css/docs.css') }}" type="text/css" rel="stylesheet">
@endsection





        @section('autocomplete_scripts1')
    <script>
            $.noConflict();
<script src="{{ asset('assets/backend/js/jquery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets\backend\js\jquery-ui-custom-function\jquery-ui.min.js')}}"></script>
   </script>
     <script type="text/javascript" src="{{ asset('assets/tags/dist/bootstrap-tokenfield.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('assets/tags/docs-assets/js/scrollspy.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('assets/tags/docs-assets/js/affix.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('assets/tags/docs-assets/js/typeahead.bundle.min.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('assets/tags/docs-assets/js/docs.min.js') }}" charset="UTF-8"></script>

    <script type="text/javascript">
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-22737379-5', 'sliptree.github.io');
      ga('send', 'pageview');
    </script>
<script>

$('#tokenfield').tokenfield({
  autocomplete: {
    source: ['red','blue','green','yellow','violet','brown','purple','black','white'],
    delay: 100
  },
  showAutocompleteOnFocus: true
})
</script>

@endsection


@section('autocomplete_scripts')
<script src="{{ asset('assets/backend/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/metisMenu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/holder-master/holder.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!-- InputMask -->
    <script src="{{ asset('assets/backend/vendors/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/backend/vendors/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/iCheck/icheck.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/iCheck/demo/js/custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/autogrow/js/jQuery-autogrow.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/card/jquery.card.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/pages/formelements.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $('li.select2-search-choice').next().css('margin-right', '10px');
    </script>
    <script type="text/javascript">  
        $(document).ready(function(){
            $('.select2-search-choice').children().css('padding-right', '12px');
            var i = 2;
            $('input.btn.btn-primary.add_more_btn').click(function(){
                $('#add-more-videos').append('<input name="vablum_videos_'+i+'" type="text" class="form-control" style="width:95%;margin-top: 13px;" placeholder="اضف الفيديو">'
                                                +'<input type="button" class="close_more_videos" value="X">');
                i++;
                var counter = document.getElementById('add-more-videos').getElementsByTagName('input').length;
                counter = counter / 2;
                $('#counter').val(counter);

            });
            $('#counter').hide();
            $('input.close_more_videos').click(function(){
                $(this).prev().hide();
                $(this).prev().val('');
                $(this).hide();
            });
        });  
    </script>
@endsection

@section('autocomplete')
  <link href="{{ asset('assets/backend/vendors/daterangepicker/css/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!--select css-->
    <link href="{{ asset('assets/backend/vendors/select2/select2.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/select2/select2-bootstrap.css') }}" />
    <!--clock face css-->
    <link href="{{ asset('assets/backend/vendors/iCheck/skins/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/pages/formelements.css') }}" rel="stylesheet" />
    <style>
        li.select2-search-choice, .display-tags{
            direction: rtl;
            float: right;
            background-color: #428BCA;
            color: white;
        }
        a.select2-search-choice-close{
            color: white;
        }
        i.glyphicon.glyphicon-chevron-up{
            display: none;
        }
    </style>
@endsection
@stop