@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 6)
@extends('backend.master')
@section('header')
 <link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.1.0.css') }}" />
@endsection
@section('content-header')
                <!--section starts-->
                <h1>اضافة الصفحات</h1>
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
                    <li class="active">اضافة الصفحات</li>
                </ol>
            @stop
@endsection

@section('content')
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                        <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>{{ trans('pages.create_page') }}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ action('PagesController@store') }}" method="POST" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                            <div class="form-group">
                                <label for="title">{{ trans('pages.title') }}</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="{{ trans('pages.title') }}">
                            </div>
                            <div class="form-group">
                                <label for="body">{{ trans('pages.body') }}</label>
                                <textarea name="body" id="input" class="form-control" rows="10">{{ old('body') }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input name="menu_active" id="menu-active" type="checkbox" value="1" @if(old('menu_active') == '1') checked @endif>
                                        {{ trans('pages.provide_menu_link') }}
                                    </label>
                                </div>
                            </div>
                            @if($menus->count())
                            <div class="form-group" id="menu-group">
                                <label for="body">{{ trans('pages.menus') }}</label>
                                <select name="menu" class="form-control">
                                    <option value="">- {{ trans('pages.menu_select') }} -</option>
                                    @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" @if(old('menu')== $menu->id) selected @endif>{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary">{{ trans('pages.save') }}</button>
                        </form>

                    </div>
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
<script>
  field = document.getElementById('menu-active');
  if (field) {
   target = document.getElementById('menu-group');
   // Hide the target field if field isn't "Yes"
   if (!field.checked) target.style.display='none';

   field.onchange=function() {
    if (this.checked) {
                     target.style.display = '';
                  } else {
              target.style.display='none';
    }
   }
  }
 </script>
 <script  src="{{ asset('assets/backend/vendors/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script>
  CKEDITOR.replace('body', {
   // filebrowserBrowseUrl : '/browse/type/all',
   // filebrowserUploadUrl : '/upload/type/all',
    filebrowserImageBrowseUrl : '/browse/images',
   // filebrowserImageUploadUrl : '/upload/image',
    filebrowserWindowWidth  : 800,
    filebrowserWindowHeight : 500
  });
</script>
@endsection
@stop