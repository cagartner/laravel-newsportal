<div class="col-sm-5 hidden-xs right-sec">
        <div class="bordered top-margin">

          <div class="row ">
          @if ($adv->count())
            @foreach ($adv as $view)
            @if ($view->position == 2)
            @foreach ($view->images as $myimage)
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <img class="img-responsive" src="/{{$myimage->medium}}" width="336" height="280" alt=""/> <a href="#" class="sponsored">{{$view->title}}</a> </div>
            @endforeach
            @endif
            @endforeach
          @endif
          </div>
          <div class="row ">
            <!-- activities start -->
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-justified " role="tablist">
                <li class="active"><a href="#popular" role="tab" data-toggle="tab">الاكثر قراءة</a></li>
                <li><a href="#recent" role="tab" data-toggle="tab">الاحداث الهامة</a></li>
              </ul>
              
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="popular">
                  <ul class="list-unstyled">
                  @if ($news_most_views->count())
                  @foreach($news_most_views as $view)
                  <?php
                      $date = '';
                      $date = $view->created_at;
                      $date = date('Y-m-d', strtotime($date));
                    ?>

                    <li> <a href="/story/{{$date}}/{{$view->link}}">
                      <div class="row">
                      @foreach($view->basic_photo as $image)
                        <div class="col-sm-5 col-md-4"><img class="img-thumbnail pull-left" src="/{{$image->small}}" width="164" height="152" alt=""/> </div>
                      @endforeach
                        <div class="col-sm-11 col-md-12">
                          <h4>{{$view->title}}</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>{{$view->created_at}}</div>
                                                      </div>
                        </div>
                      </div>
                      </a> </li>
                  @endforeach
                  @endif
                  </ul>
                </div>
                <div class="tab-pane" id="recent">
                  <ul class="list-unstyled">
                  @foreach ($news_most_imp as $view)
                  <?php
                      $date = '';
                      $date = $view->created_at;
                      $date = date('Y-m-d', strtotime($date));
                    ?>
                    <li> <a href="/story/{{$date}}/{{$view->link}}">
                      <div class="row">
                        <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="/{{$view->small}}" width="164" height="152" alt=""/> </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4>{{$view->title}}</h4>
                          <div class="text-danger sub-info">
                            <div class="time"><span class="ion-android-data icon"></span>{{$view->created_at}}</div>
                                                      </div>
                        </div>
                      </div>
                      </a> </li>
                  @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <!-- activities end --> 
            <!-- radio start -->
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="100">
              <div class="main-title-outer pull-left">
                <div class="main-title">احدث فيديو</div>
              </div>
              @if (!empty($videos))
               <iframe width="100%" height="166" scrolling="no" frameborder="no" src="{{$videos->video}}"></iframe>
              @endif
            </div>
            <!-- radio end --> 
            
            <!-- calendar start -->
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50">
              <div class="single pull-left"></div>
            </div>
            <!-- calendar end --> 
            <!-- flicker imgs start -->
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="35">
              <div class="main-title-outer pull-left">
                <div class="main-title">احدث الصور</div>
              </div>
              <ul class="list-inline">
              @if ($images->count())
              @foreach($images as $image)
                <li><a href="#" target="_blank"><img class="img-responsive" src="/{{$image->small}}" width="55" height="55" alt=""/></a></li>
              @endforeach
              @endif
              </ul>
            </div>
            <!-- flicker imgs end --> 
          </div>
        </div>
      </div>