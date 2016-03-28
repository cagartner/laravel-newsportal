@inject('permissions', 'App\Http\Controllers\GroupController')

<aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu" id="menu">
                    @if ($permissions->get()->count())
                    @foreach ($permissions->get() as $view)
                    @if ($view->status == 1 && $view->permission == 1)

                        <li>
                            <a href="/admin/dashboard">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">لوحة التحكم</span>
                            </a>

                        </li>
                    @endif
                    @if ($view->status == 1 && $view->permission == 2)
                        <li class="{{ Request::is('admin/groups') ? 'active' : '' }}{{ Request::is('admin/groups/*') ? 'active' : '' }}">
                            <a href="/admin/groups">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">المجموعات</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/groups">
                                        <i class="fa fa-angle-double-left"></i>
                                        قائمة المجموعات
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/groups/create">
                                        <i class="fa fa-angle-double-left"></i>
                                        اضافة مجموعة جديدة
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    @if ($view->status == 1 && $view->permission == 3)
                        <li class="{{ Request::is('admin/admins') ? 'active' : '' }}{{ Request::is('admin/admins/*') ? 'active' : '' }}{{ Request::is('admin/admins/*/*') ? 'active' : '' }}{{ Request::is('admin/admins/*/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="users" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                                <span class="title">الاعضاء</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/admins">
                                        <i class="fa fa-angle-double-left"></i>
                                        قائمة الاعضاء
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/admins/create">
                                        <i class="fa fa-angle-double-left"></i>
                                        اضافة عضو جديد
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    @if ($view->status == 1 && $view->permission == 4)
                        <li class="{{ Request::is('admin/sections') ? 'active' : '' }}{{ Request::is('admin/sections/*') ? 'active' : '' }}{{ Request::is('admin/sections/*/*') ? 'active' : '' }}{{ Request::is('admin/sections/*/*/*') ? 'active' : '' }}">
                            <a href="/admin/sections">
                                <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                                <span class="title">الاقسام</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/sections">
                                        <i class="fa fa-angle-double-left"></i>
                                        قائمة الاقسام
                                    </a>
                                    <a href="/admin/sections/create">
                                        <i class="fa fa-angle-double-left"></i>
                                        اضافة قسم جديد
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    @if ($view->status == 1 && $view->permission == 5)
                        <li class="{{ Request::is('admin/news') ? 'active' : '' }}{{ Request::is('admin/news/*') ? 'active' : '' }}{{ Request::is('admin/news/*/*') ? 'active' : '' }}{{ Request::is('admin/news/*/*/*') ? 'active' : '' }}">
                            <a href="/admin/news">
                                <i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true" id="livicon-33" style="width: 18px; height: 18px;"></i>
                                <span class="title">الاخبار</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/news">
                                        <i class="fa fa-angle-double-left"></i>
                                        قائمة الاخبار
                                    </a>
                                    <a href="/admin/news/create">
                                        <i class="fa fa-angle-double-left"></i>
                                        اضافة خبر جديد
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    @if ($view->status == 1 && $view->permission == 6)
                        <li class="{{ Request::is('admin/pages') ? 'active' : '' }}{{ Request::is('admin/pages/*') ? 'active' : '' }}{{ Request::is('admin/pages/*/*') ? 'active' : '' }}{{ Request::is('admin/pages/*/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="edit" data-size="20" data-c="#f6bb42" data-hc="#f6bb42" data-loop="true"></i>
                                <span class="title">{{ trans('backend.pages') }} </span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="{{ Request::is('admin/pages') ? 'active' : '' }}{{ Request::is('admin/pages/*') ? 'active' : '' }}{{ Request::is('admin/pages/*/*') ? 'active' : '' }}{{ Request::is('admin/pages/*/*/*') ? 'active' : '' }}">
                                    <a href="/admin/pages">
                                    <i class="fa fa-angle-double-left"></i>
                                      {{ trans('backend.list_pages') }}
                                    </a>
                                </li>
                                <li class="{{ Request::is('admin/pages/create') ? 'active' : '' }}">
                                    <a href="/admin/pages/create">
                                    <i class="fa fa-angle-double-left"></i>
                                      {{ trans('backend.add_new_page') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    @if ($view->status == 1 && $view->permission == 7)
                        <li class="{{ Request::is('admin/menus') ? 'active' : '' }} {{ Request::is('admin/menus/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="list" data-size="20" data-c="#f6bb42" data-hc="#f6bb42" data-loop="true"></i>
                                <span class="title">{{ trans('backend.menus') }}</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="{{ Request::is('admin/menus') ? 'active' : '' }}">
                                    <a href="/admin/menus">
                                        <i class="fa fa-angle-double-left"></i>
                                        {{ trans('backend.list_menus') }}
                                    </a>
                                </li>
                                <li class="{{ Request::is('admin/menus/create-link') ? 'active' : '' }}">
                                    <a href="/admin/menus/create-link">
                                        <i class="fa fa-angle-double-left"></i>
                                        {{ trans('backend.add_link') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    @if ($view->status == 1 && $view->permission == 8)
                        <li  class="{{ Request::is('admin/contact-us') ? 'active' : '' }} {{ Request::is('admin/contact-us/*') ? 'active' : '' }} {{ Request::is('admin/contact-us/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="barchart" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">اتصل بنا</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/contact-us/gmap/edit">
                                        تحرير الموقع على الخريطة
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/contact-us/cont-info/edit">
                                        تحرير معلومات التواصل
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/contact-us/contacts">
                                        عرض الرسائل لم يتم الرد عليها
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                    <a href="/admin/contact-us/contacts-replied">
                                        عرض الرسائل تم الرد عليها
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if ($view->status == 1 && $view->permission == 9)
                        <li  class="{{ Request::is('admin/opinions') ? 'active' : '' }} {{ Request::is('admin/opinions/*') ? 'active' : '' }} {{ Request::is('admin/opinions/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="image" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">استطلاعات الرأئ</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/opinions">
                                        <i class="fa fa-angle-double-left"></i>
                                        قائمة استطلاعات الرأئ
                                    </a>
                                    <a href="/admin/opinions/create">
                                        <i class="fa fa-angle-double-left"></i>
                                        اضافة استطلاع الرأئ
                                    </a>
                                </li>
                            </ul>
                            
                        </li>
                        @endif
                        @if ($view->status == 1 && $view->permission == 10)
                        <li  class="{{ Request::is('admin/advertisements') ? 'active' : '' }} {{ Request::is('admin/advertisements/*') ? 'active' : '' }} {{ Request::is('admin/advertisements/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="doc-portrait" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">الاعلانات</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/advertisements">
                                        <i class="fa fa-angle-double-left"></i>
                                        الاعلانات
                                    </a>
                                    <a href="/admin/advertisements/create">
                                        <i class="fa fa-angle-double-left"></i>
                                        انشاء اعلان
                                    </a>
                                </li>
                            </ul>
                            
                        </li>
                        @endif
                        @if ($view->status == 1 && $view->permission == 11)
                        <li  class="{{ Request::is('admin/settings/edit') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="move" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">الاعدادات العامة</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/settings/edit">
                                        <i class="fa fa-angle-double-left"></i>
                                        تعديل الاعدادات العامة
                                    </a>
                                </li>
                            </ul>
                            
                        </li>
                        @endif
                        @if ($view->status == 1 && $view->permission == 12)
                        <li  class="{{ Request::is('admin/report/advertisements') ? 'active' : '' }} {{ Request::is('admin/report/news') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="table" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">التقارير</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/report/news">
                                        <i class="fa fa-angle-double-left"></i>
                                        تقارير الاخبار
                                    </a>
                                    <a href="/admin/report/advertisements">
                                        <i class="fa fa-angle-double-left"></i>
                                        تقارير الاعلانات
                                    </a>
                                </li>
                            </ul>
                            
                        </li>
                        @endif
                        @if ($view->status == 1 && $view->permission == 14)
                        <li class="{{ Request::is('admin/social-media') ? 'active' : '' }} {{ Request::is('admin/social-media/*') ? 'active' : '' }} {{ Request::is('admin/social-media/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="flag" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">وسائل التواصل الاجتماعي</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/social-media/create">
                                        اضافة وسائل التواصل الاجتماعي
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/social-media">
                                        وسائل التواصل الاجتماعي
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    @endforeach
                    @endif
                    </ul>
                    <!-- END SIDEBAR MENU --> </div>
            </section>
            <!-- /.sidebar --> </aside>