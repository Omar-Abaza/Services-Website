@extends('front.layout')

@section('main')
    @include('front.partials.blocks.page-header')

    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <div id="page-slider" class="page-slider small-bg">
                        @foreach ($galleries as $gallery)
                            <div class="item">
                                <img loading="lazy" class="img-fluid" src="{{ asset("storage/projects/$gallery->image") }}"
                                    alt="project-image" />
                            </div>
                        @endforeach
                    </div><!-- Page slider end -->
                </div><!-- Slider col end -->

                <div class="col-lg-4 mt-5 mt-lg-0">

                    <h3 class="column-title mrt-0">{{ "$project->name" }}</h3>
                    <p>{{ "$project->description" }}</p>


                        <div class="sidebar sidebar-left">
                            <div class="widget">
                                <h3 class="widget-title">Related Projects </h3>
                                <ul class="nav service-menu">
                                    @foreach ($project->services as $service)
                                        <li><a
                                                href="{{ route('front.services-single', $service->id) }}">{{ $service->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- Widget end -->
                        </div>

                </div><!-- Content col end -->

            </div><!-- Row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
@endsection
