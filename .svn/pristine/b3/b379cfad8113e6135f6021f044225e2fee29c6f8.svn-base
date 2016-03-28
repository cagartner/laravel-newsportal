@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 7)
@extends('backend.master')

@section('content-header')
                <!--section starts-->
                <h1>القوائم</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="/admin/menus">القوائم</a>
                    </li>
                </ol>
            @stop
@endsection

@section('content')
            
<div class="row">
    <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    استعراض القوائم
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-responsive">
                                 @if ($menus->count())
                                    <table class="table table-bordered">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>اسم القائمة</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>
                                                {{ $menu->name }}
                                            </td>
                                            <td class="">
                                                <a href="{{action('MenusController@list_links', $menu->id)}}"><i class="fa fa-link"></i>قائمة الروابط</a>
                                                {{--<a href="{{action('PagesController@destroyconfirm', $menu->id)}}"><i class="fa fa-trash-o"></i> حذف</a>--}}
                                           </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <div class="text-center"><h1>لا توجد نتائج</h1> </div>
                                    @endif
                                    </tbody>

                                </table>
                                <div> <i class="fa fa-folder-o"></i> اجمال : {{$menus->total()}} قائمة </div>
                            </div>
                </div>
            </div>
        </div>
</div>
@endif
                        @if ($view->status == 2 && $view->permission == 7)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
@endsection
@section('footer')

@endsection
@stop
