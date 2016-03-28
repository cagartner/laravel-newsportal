@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 7)

@extends('backend.master')
@section('header')
@endsection
@section('content-header')
                <!--section starts-->
                <h1>انشاء الروابط</h1>
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
                    <li class="active">انشاء الروابط</li>
                </ol>
            @stop
@endsection

@section('content')
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                        <h3 class="panel-title"><i class="livicon" data-name="edit" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>انشاء رابط</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ action('MenusController@store_link') }}" method="POST" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                            <div class="form-group">
                                <label for="title">العنوان</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="title">
                            </div>
                            <div class="form-group">
                                <label for="link">الرباط</label>
                                <input type="text" class="form-control" name="link" value="{{ old('link') }}" placeholder="link">
                                <p class="help-block">
                                    <b>مثال للرابط خارجي:</b> http://www.google.com <br />
                                    <b>مثال للرابط داخلي:</b> /page/welcome <br />
                                </p>
                            </div>
                            @if($menus->count())
                            <div class="form-group">
                                <label for="menu">القائمة</label>
                                <select name="menu" id="" class="form-control">
                                    <option value="">- اختر القائمة -</option>
                                    @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" @if(old('menu') == $menu->id) selected @endif>{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                    <label for="source" class="control-label">
                                        Parent
                                    </label>
                                    <p class="display-no">
                                        <select name="source" id="source" class="wd">

                                        @foreach($menus as $menu)
                                            <optgroup label="{{ $menu->name }}">
                                                <option value="menu_{{ $menu->id }}">No parent</option>
                                                @foreach($menu->links as $link)
                                        @if($link->parent == '0')
                                        <option value="{{ $link->id }}">- {{ $link->title }}</option>
                                            <!-- level 1 -->
                                            @if($link->has_children == '1')
                                                @foreach($menu->childrens as $link_1)
                                                @if($link_1->parent == $link->id)
                                                <option value="{{ $link_1->id }}">-- {{ $link_1->title }}</option>
                                                        <!-- level 2 -->
                                                        @if($link_1->has_children == '1')
                                                            @foreach($menu->childrens as $link_2)
                                                            @if($link_2->parent == $link_1->id)
                                                            <option value="{{ $link_2->id }}">--- {{ $link_2->title }}</option>
                                                                {{-- level 3 -->>
                                                                @if($link_2->has_children == '1')
                                                                        @foreach($menu->childrens as $link_3)
                                                                        @if($link_3->parent == $link_2->id)
                                                                        <option value="{{ $link_3->id }}">--- {{ $link_3->title }}</option>
                                                                                <!-- level 4 -->
                                                                                @if($link_3->has_children == '1')
                                                                                    @foreach($menu->childrens as $link_4)
                                                                                    @if($link_4->parent == $link_3->id)
                                                                                    <option value="{{ $link_4->id }}" disabled>---- {{ $link_4->title }}</option>
                                                                                    @endif
                                                                                    @endforeach
                                                                                @endif
                                                                        @endif
                                                                        @endforeach
                                                                @endif
                                                            @endif
                                                            @endforeach
                                                        @endif
                                                @endif
                                                @endforeach
                                            @endif
                                        @endif
                                        @endforeach
                                            </optgroup>
                                        </select>
                                        @endforeach
                                        
                                    </p>
                            </div> --}}
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                                <a class="btn btn-primary" href="/admin/menus">الغاء</a>
                            </div>
                        </form>
                    </div>
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
@stop