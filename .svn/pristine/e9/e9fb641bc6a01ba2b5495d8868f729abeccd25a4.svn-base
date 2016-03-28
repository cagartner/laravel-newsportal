@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 9)
            @extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>تعديل استطلاع رأي</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="/admin/opinions">استطلاعات الرأي</a>
                    </li>
                    <li class="active">تعديل استطلاع رأي</li>
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
                                                تعديل استطلاع رأي
                                            </h3>
                                            <span class="pull-right">
                                                <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                                <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                            </span>
                                        </div>
                            <div class="panel-body">
                                        {!! Form::model($opinion, [$opinion->id, 'method' => 'POST']) !!}
                                    <div class="form-group">
                                      <label>السؤال</label><br>    
                                        {!! Form::text('question', null, 
                                              array('class'=>'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                            {!! Form::label('الخيارات') !!}
                                            <div id="main">
                                                @if ($options->count())
                                                    @foreach ($options as $option)
                                                        <input type='text' value="{{$option->option}}" name="option{{ $option->counter }}" class="form-control"/><br>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <input type="button" id="abc" value="اضافة المزيد" />
                                            <input type='text' name='counter' id="counter" value="{{$options->count()}}" />
                                        </div>

                                    <div class="form-group">
                                        <input type="checkbox" name="status" value="checked" @if ($opinion->status == 1) checked @endif>
                                        <label>تفعيل الاستطلاع</label><br>
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
                        @if ($view->status == 2 && $view->permission == 9)
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
                    var count = $('#counter').val();
                    var i = ++count;
                    $("#abc").click(function() {
                        var input = "<input type='text' name='phone"+i+"' class='form-control'/><br>";
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
                    <link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
                @stop