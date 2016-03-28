
@inject('socials', 'App\Http\Controllers\HomeController')
@inject('settings', 'App\Http\Controllers\HomeController')
@inject('mytags', 'App\Http\Controllers\HomeController')
<!-- Footer start -->
  <footer>
    <div class="top-sec">
      <div class="container ">
        <div class="row match-height-container">
          <div class="col-sm-8 subscribe-info wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <div class="row">
              <div class="col-sm-16">
                  <div class="f-title">رئيس التحرير: {{$settings->getsettings()->editor}}</div>
                  <p>{{$settings->getsettings()->description}}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-8 popular-tags  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <div class="f-title">احدث التاجات</div>
            <ul class="tags list-unstyled pull-left">
            @if ($mytags->gettags()->count())
              @foreach ($mytags->gettags() as $tag)
              <?php 
                $path = $tag->tags;
                $path = str_replace(' ', '-', $path);
              ?>
                <li><a href="/tags/{{$path}}">{{$tag->tags}}</a></li>
              @endforeach
            @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="btm-sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-16">
            <div class="row">
              <div class="col-sm-10 col-xs-16 f-nav wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10">
                 جميع الحقوق محفوظة &copy; {{$settings->getsettings()->name}} 2015
              </div>
              <div class="col-sm-6 col-xs-16 copyrights text-right wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10"><img src="/img/innoflame_logo/innoflame.png"> Powered by INNOFLAME</div>
            </div>
          </div>
          <div class="col-sm-16 f-social  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="10">
            <ul class="list-inline">
            @if ($socials->getsocial()->count())
            @foreach ($socials->getsocial() as $mysocial)
              <li> <a href="{{$mysocial->link}}"><span class=""></span><img src="/img/uploaded/social_media/{{$mysocial->basic_photo}}" style="width: 25px;margin-bottom: 7px;"></a> </li>
            @endforeach
            @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer end -->

