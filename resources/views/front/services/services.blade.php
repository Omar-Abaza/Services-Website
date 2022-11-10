@extends("front.layout")

@section("main")
@include("front.partials.blocks.page-header")

<section id="main-container" class="main-container pb-2">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                            <img loading="lazy" class="w-100" src="{{ asset("storage/services/$service->image") }}"
                                alt="service-image">
                        </div>
                        <div class="d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="{{ asset("storage/icon-image/$service->icon_image") }}" alt="service-icon">
                            </div>
                            <div class="ts-service-info">
                                <h3 class="service-box-title"><a href="{{ route('front.services-single', $service->id) }}">{{$service->name}}</a></h3>
                                <p>{{$service->small_desc}}</p>
                                <a class="learn-more d-inline-block" href="{{ route('front.services-single', $service->id) }}"
                                    aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                            </div>
                        </div>
                    </div><!-- Service1 end -->
                </div><!-- Col 1 end -->
            @endforeach

        </div><!-- Main row end -->
    </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection