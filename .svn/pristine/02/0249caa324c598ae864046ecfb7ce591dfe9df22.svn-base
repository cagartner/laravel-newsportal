@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 8)
@extends('backend.master')
@section('content-header')
<!-- Main content -->
<h1>اتصل بنا</h1>
<ol class="breadcrumb">
    <li>
        <a href="/admin/dashboard">
            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
            الرئيسية
        </a>
    </li>
    <li class="active">تواصل معنا</li>
</ol>
@endsection
@section('content')
{!! Form::open(array('method' => 'post')) !!}
            <div class="row">
                <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    {{$table_name}}
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-responsive">
                                 @if ($contacts->count())
                                    <table class="table table-bordered">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="check_all" id="checkall">
                                            </th>
                                            <th>الاسم</th>
                                            <th>رقم الجوال</th>
                                            <th>البريد الالكتروني</th>
                                            <th>العنوان</th>
                                            <th>حالة الرد</th>
                                            <th>تاريخ الرسالة</th>
                                            <th>تفاصيل الرسالة و الرد علىها</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contacts as $view)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                            </td>
                                            <td>
                                                {{ $view->name }}
                                            </td>
                                            <td>
                                                {{ $view->mobile }}
                                            </td>
                                            <td>
                                                {{ $view->mail }}
                                            </td>
                                            <td>
                                                {{ $view->address }}
                                            </td>
                                            <td>
                                                @if ($view->reply_status == 1)
                                                <span class="label label-sm label-success">تم الرد</span>
                                                    
                                                @else
                                                    <span class="label label-sm label-warning">لم يتم الرد</span>
                                                
                                                @endif
                                            </td>
                                           
                                            <td>
                                                {{ $view->created_at }}
                                            </td>
                                            <td>
                                                <i class="fa fa-fw fa-tasks"></i><a href="/admin/contact-us/contacts/{{$view->id}}">تفاصيل الرسالة</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
                                    @endif
                                    </tbody>

                                </table>

                            @if (count($contacts))
                            <div class="form-inline">
                                <div class="form-group">     
                                    <input type="submit" name="delete" value="مسح" class="btn btn-primary"  style="width:120px;">                    
                                </div>
                                <div class="form-group">
                                    <a href="/admin/contact-us/contacts/all">الرد على جميع الرسائل</a>
                                </div>
                            </div>
                            @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $contacts->count() }} رسالة </div>
                            
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>     
            @endif
                        @if ($view->status == 2 && $view->permission == 8)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
@endsection
@section('footer_scripts')
<script>
    $('#checkall').change(function(event) {
        if(this.checked) {
            $('.check_list').each(function() {
                this.checked = true;
            });
        }else{
            $('.check_list').each(function() {
                this.checked = false;
            });        
        }
    });
</script>
@endsection
@stop