@extends("front.layout")

@section("main")
@include("front.partials.blocks.page-header")

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-4">
                <div class="sidebar sidebar-left">
                    <div class="widget">
                        <h3 class="widget-title">Related Projects </h3>
                        <ul class="nav service-menu">
                            @foreach ($service->projects as $project)
                                <li><a href="{{ route('front.projects-single', $project->id) }}">{{ ($project->name)}}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- Widget end -->

                    <div class="widget">
                        <div class="quote-item quote-border">
                            <div class="quote-text-border">
                                {{$teams->title}}
                            </div>

                            <div class="quote-item-footer">
                                <img loading="lazy" class="testimonial-thumb" src="{{asset("front/images/clients/testimonial1.png")}}"
                                    alt="testimonial">
                                <div class="quote-item-info">
                                    <h3 class="quote-author">{{$teams->name}}</h3>
                                    <span class="quote-subtext">{{$teams->job}}</span>
                                </div>
                            </div>
                        </div><!-- Quote item end -->

                    </div><!-- Widget end -->

                </div><!-- Sidebar end -->
            </div><!-- Sidebar Col end -->

            <div class="col-xl-8 col-lg-8">
                <div class="content-inner-page">

                    <h2 class="column-title mrt-0">{{ $services_single->name }}</h2>

                    <div class="row">
                        <div class="col-md-12">
                            <p>{{ $services_single->description }}</p>
                        </div><!-- col end -->
                    </div><!-- 1st row end-->

                    <div class="gap-40"></div>

                            <div class="item">
                                <img loading="lazy" class="img-fluid"
                                    src="{{ asset("storage/services/$service->image") }}" alt="project-image" />
                            </div>

                    <div class="gap-40"></div>

                </div><!-- Content inner end -->
            </div><!-- Content Col end -->


        </div><!-- Main row end -->
    </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection
