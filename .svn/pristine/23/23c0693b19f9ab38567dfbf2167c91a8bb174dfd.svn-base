@inject('messages', 'App\Http\Controllers\ContactUsController')
@inject('settings', 'App\Http\Controllers\HomeController')
       
<header class="header">
        <link rel="shortcut icon" type="image/x-icon" href="/{{$settings->getsettings()->favicon}}"/>
        <a href="/admin/dashboard" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="/{{$settings->getsettings()->logo}}" alt="{{$settings->getsettings()->name}}"></a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="message-flag" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                            <span class="label label-success">{{$messages->get()->count()}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages pull-right" style="text-align: right;">
                            <li class="dropdown-title">
                                {{$messages->get()->count()}} رسائل جديدة
                            </li>
                            @if ($messages->get()->count())
                                @foreach ($messages->get() as $message)
                                    <li class="unread message">
                                        <a href="/admin/contact-us/contacts/{{$message->id}}" class="message" style="text-align: right;"> 
                                        <i class="fa fa-fw fa-envelope"></i>
                                            <div class="message-body"> <strong>{{$message->name}}</strong>
                                                <br>
                                                <?php
                                                    $limit = 90;
                                                    $mymessage = $message->message;
                                                        if (strlen($mymessage) > $limit)
                                                          $mymessage = substr($mymessage, 0, strrpos(substr($mymessage, 0, $limit), ' ')) . '...';
                                                ?>
                                                {{$mymessage}}
                                                <br>
                                                <small>
                                                    {{$message->created_at}}
                                                </small>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif 
                            <li class="footer">
                                <a href="/admin/contact-us/contacts">مشاهدة كل الرسائل</a>
                            </li>
                        </ul>
                    </li>
                   
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/img/users/{{Auth::user()->basic_photo}}" width="35" class="img-circle img-responsive pull-left" height="35" alt="">
                            <div class="riot">
                                <div>
                                    {{Auth::user()->name}}
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="/img/users/{{Auth::user()->basic_photo}}" class="img-responsive img-circle" alt="">
                                <p class="topprofiletext">{{Auth::user()->name}}</p>
                            </li>
                            <!-- Menu Body -->
                            <li>
                                <a href="/admin/profile" style="float:right;direction:rtl;margin-top: 7px;">
                                    <i class="livicon" data-name="user" data-s="18"></i>
                                    حسابي
                                </a>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="/admin/logout">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        خروج
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>