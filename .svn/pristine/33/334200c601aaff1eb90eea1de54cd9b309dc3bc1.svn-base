@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 6)
@extends('backend.master')

@section('content-header')
                <!--section starts-->
                <h1>قائمة الصفحات</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li class="active">الصفحات</li>
                </ol>
            @stop

@section('content')
            
<div class="row">
    <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                     {{ trans('pages.list_pages') }}
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-responsive">
                                 @if ($pages->count())
                                    <table class="table table-bordered">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>{{ trans('pages.code') }}</th>
                                            <th>{{ trans('pages.title') }}</th>
                                            <th>{{ trans('pages.created_by') }}</th>
                                            <th>{{ trans('pages.created_at') }}</th>
                                            <th>{{ trans('pages.last_update') }}</th>
                                            <th>{{ trans('pages.operations') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>
                                                {{ $page->id }}
                                            </td>
                                            <td>
                                                {{ $page->title }}
                                            </td>
                                            <td>
                                            @if($page->author)
                                                {{ $page->author->name }}
                                            @endif
                                            </td>
                                            <td>
                                                {{ $page->created_at }}
                                            </td>
                                            <td>
                                                {{ $page->updated_at }}
                                            </td>
                                            <td class="">
                                                <a href="{{action('PagesController@edit', $page->id)}}"><i class="fa  fa-edit"></i> {{ trans('pages.edit') }}</a>
                                                <a href="{{action('PagesController@destroyconfirm', $page->id)}}"><i class="fa fa-trash-o"></i> {{ trans('pages.delete') }}</a>
                                           </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <div class="text-center"><h1>{{ trans('pages.no_results') }}</h1> </div>
                                    @endif
                                    </tbody>

                                </table>
                                <div class="count"> <i class="fa fa-folder-o"></i> {{ trans('pages.total') }} : {{ $pages->total() }} {{ trans('pages.page') }} </div>
                                 <div class="pagination-area"> {!! $pages->render() !!} </div>
                            </div>
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
@section('footer')

@endsection
@stop
