@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 14)
@extends('backend.master')
@section('content-header')
<!-- Main content -->
<h1><i class="livicon" data-name="flag" data-size="30" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i> شبكات التواصل الاجتماعي</h1>
<ol class="breadcrumb">
    <li>
        <a href="/admin/dashboard">
            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
            الرئيسية
        </a>
    </li>
    <li>
        <a href="/admin/social-media">شبكات التواصل الاجتماعي</a>
    </li>
</ol>
@endsection
                @section('content')
                {!! Form::open(array('method' => 'post', 'files'=>true, 'class' => 'form-inline')) !!}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    استعراض قائمة شبكات التواصل الاجتماعي
                                </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                    @if ($social->count())
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="float:right;">
                                                </th>
                                                <th>الكود</th>
                                                <th>الصورة الرئيسية</th>
                                                <th>العنوان</th>
                                                <th>الرابط</th>
                                                <th>
                                                    العمليات
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($social as $view)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                                </td>
                                                <td> {{ $view->id }}</td>
                                                <td><img src="/img/uploaded/social_media/{{ $view->basic_photo }}" style="width:70px; height:50px; "></td>                                                
                                                <td>{{ $view->title }}</td>
                                                <td>{{ $view->link }}</td>
                                                <td>
                                                    <a href="/admin/social-media/{{$view->id}}/edit">تعديل</a> - 
                                                    <a href="/admin/social-media/{{$view->id}}/delete">حذف</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (!($social->count()))
                                        <div class="text-center"><h1>عفوا لا يوجد نتائج</h1> </div>
                                    @endif
                                    </tbody>
                                </table>
                                @if (count($social))
                                    <div class="form-group">
                                        <input type="submit" name="delete" value="مسح" class="btn btn-primary">
                                    </div>
                                @endif
                                <div> <i class="fa fa-folder-o"></i> إجمالي : {{ $social->count() }} شبكة تواصل اجتماعي </div>
                            </div>
                        </div>
                    </div>
                </div>           
                {!! Form::close() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav>
                                <ul class="pagination">
                                    {!! $social->render() !!}
                                </ul>
                            </nav>                        
                        </div>
                    </div>
                </div>
                <!-- row-->
                                @endif
                        @if ($view->status == 2 && $view->permission == 14)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
                @endsection
                @section('script')
                    <script>
                            $('#checkall').change(function(event) {
                                if(this.checked) {
                                    $('.check_list').each(function() {
                                        this.checked = true;
                                    });
                                }
                                else{
                                    $('.check_list').each(function() {
                                        this.checked = false;
                                    });        
                                }
                            });
                    </script>    
                @endsection
                @section('footer')
                <style type="text/css">
                    #form-hidden-imd{
                        display: none;
                    }
                </style>
                @endsection
                @stop