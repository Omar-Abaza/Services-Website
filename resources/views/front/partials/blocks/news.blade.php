<section id="news" class="news">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">Work of Excellence</h2>
                <h3 class="section-sub-title">Recent Events</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            @foreach ($events as $event)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="latest-post">
                        <div class="latest-post-media">
                            <a href="{{ route("front.events-single",$event->id)}}" class="latest-post-img">

                                <img loading="lazy" class="img-fluid" src="{{ asset("storage/events/$event->image") }}"
                                    alt="img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4 class="post-title">
                                <a href="{{ route("front.events-single",$event->id)}}" class="d-inline-block">{{$event->title}}</a>
                            </h4>
                            <div class="latest-post-meta">
                                <span class="post-item-date">
                                    <i class="fa fa-clock-o"></i> {{$event->created_at}}
                                </span>
                            </div>
                        </div>
                    </div><!-- Latest post end -->
                </div><!-- 1st post col end -->
            @endforeach

        </div>
        <!--/ Content row end -->

        <div class="general-btn text-center mt-4">
            <a class="btn btn-primary" href="{{ route("front.events-list")}}">See All Events</a>
        </div>

    </div>
    <!--/ Container end -->
</section>
<!--/ News end -->
