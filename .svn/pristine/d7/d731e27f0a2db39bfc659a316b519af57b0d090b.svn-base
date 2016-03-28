@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 6)
@extends('backend.master')

@section('content-header')
                <!--section starts-->
                <h1>حذف الصفحات</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li>
                        <a href="/admin/pages">الصفحات</a>
                    </li>
                    <li class="active">حذف الصفحات</li>
                </ol>
            @stop
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="panel panel-primary">
				<div class="panel-heading">
           			<h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>{{ trans('pages.page_delete_confirm') }}</h3>
                </div>

				<div class="panel-body">
                    <div class="alert alert-warning">
                        {{ trans('pages.delete_confirm_msg') }} <strong>{{ $page->title }} ؟</strong>
                    </div>
                    <form action="{{ action('PagesController@destroy', $page->id) }}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <a class="btn btn-primary" href="/admin/pages">{{ trans('pages.cancel') }}</a>

                    <button type="submit" class="btn btn-primary">{{ trans('pages.delete') }}</button>

                    </form>
                </div>
        </div>
    </div>                          
</div>
                @endif
                        @if ($view->status == 2 && $view->permission == 6)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
@endsection
@stop