@extends("front.layout")

@section("main")
@include("front.partials.blocks.page-header")

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="post-content post-single">
                    <div class="post-media post-image">
                        <img loading="lazy" src="{{ asset("storage/events/$event->image") }}" class="img-fluid"
                            alt="post-image">
                    </div>

                    <div class="post-body">
                        <div class="entry-header">
                            <div class="post-meta">
                                <span class="post-meta-date"><i class="far fa-calendar"></i>
                                    {{ $event->created_at }}</span>
                            </div>
                            <h2 class="entry-title">
                                {{ $event->title }}
                            </h2>
                        </div><!-- header end -->
                        <div class="entry-content">
                            <p>{{ $event->body }}</p>
                            <p>{{ $event->body }} </p>
                        </div>
                    </div><!-- post-body end -->
                </div><!-- post content end -->
            </div><!-- Content Col end -->
            <div class="col-lg-4">
                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Recent Events</h3>
                        <ul class="list-unstyled">
                            @foreach ($recent_events as $event)
                                <li class="d-flex align-items-center">
                                    <div class="posts-thumb">
                                        <a href="{{ route("front.events-single",$event->id)}}"><img loading="lazy" alt="img"
                                                src="{{ asset("storage/events/$event->image") }}"></a>
                                    </div>
                                    <div class="post-info">
                                        <h4 class="entry-title">
                                            <a href="{{ route("front.events-single",$event->id)}}">{{ $event->title }}</a>
                                        </h4>
                                    </div>
                                </li><!-- 1st post end-->
                            @endforeach
                            <!-- 1st post end-->
                        </ul>
                    </div><!-- Recent post end -->
                </div><!-- Sidebar end -->
            </div><!-- Sidebar Col end -->
        </div><!-- Main row end -->
    </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection