@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 4)
            @extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>تعديل القسم</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sections">الاقسام</a>
                    </li>
                    <li class="active">تعديل القسم</li>
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
                                    تعديل القسم {{$section->name}}
                                </h3>
                            </div>
                <div class="panel-body">
                    {!! Form::model($section, [$section->id, 'method' => 'POST']) !!}
                        <div class="form-group">
                            <label>الاسم</label><br>
                            {!! Form::text('name', null, 
                              array('class'=>'form-control')) !!}
                        </div>

                        @if ($section->activation == 1)
                                        <div class="form-group">
                                          <input type="checkbox" name="activation" value="checked" checked>
                                          <label>تفعيل القسم</label><br>
                                        </div>
                                        @else
                                        <div class="form-group">
                                          <input type="checkbox" name="activation" value="checked">
                                          <label>تفعيل القسم</label><br>
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
                        @if ($view->status == 2 && $view->permission == 4)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
@stop