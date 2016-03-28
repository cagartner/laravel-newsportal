@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 9)
@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>حذف القسم</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="/admin/opinions">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            استطلاعات الرأي
                        </a>
                    </li>
                    <li class="active">حذف استطلاعات الرأي</li>
                </ol>
            @stop
            <!--section ends-->
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                       تأكيد حذف الاستطلاعات
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary filterable">
                                    <div class="panel-body">
                                    <p style="color: rgb(224, 109, 109);"><i class="fa fa-fw fa-bell"></i> تحذير: سيتم حذف نتيجة التصويت التابعة لهذا للاستطلاع مع حذف الاستطلاع</p>
                                        <table class="table table-striped table-responsive" id="table1">
                                            @if ($opinions->count())
                                            <thead>
                                                @foreach ($opinions as $view)
                                                    @if (!empty($view))
                                                        
                                                            <tr>
                                                                <th>{{$view->question}}</th>
                                                            </tr>
                                                        
                                                    @endif
                                                @endforeach
                                                </thead>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="panel-body">
                    {!! Form::open(array('method' => 'post')) !!}
                    <div class="form-group" style="float: right;">
                        {!! Form::submit('حذف', 
                          array('class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        <a href="/admin/opinions" style="margin-right: 10px;font-size: 24px;">الغاء</a>
                    </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
                                @endif
                        @if ($view->status == 2 && $view->permission == 9)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
@stop
@section('header_styles')
<style type="text/css">
    .panel-primary {
        border-color: white !important;
    }
</style>
@stop