@extends("front.layout")

@section("main")
@include("front.partials.blocks.page-header")

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="column-title">Who We Are</h3>
                <p>{{ "$about->description" }}</p>
                <blockquote>{!! "$about->quote" !!}</blockquote>

            </div><!-- Col end -->

            <div class="col-lg-6 mt-5 mt-lg-0">
                <div id="page-slider" class="page-slider small-bg">
                    @foreach ($abouts as $about)
                        <div class="item"
                            style="background-image:url({{ asset("front/images/slider-pages/$about->image") }})">
                            <div class="container">
                                <div class="box-slider-content">
                                    <div class="box-slider-text">
                                        <h2 class="box-slide-title">{{ $about->title }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Item 1 end -->
                    @endforeach
                </div><!-- Page slider end-->

            </div><!-- Col end -->
        </div><!-- Content row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->


@include('front.partials.blocks.facts-counter')

<section id="ts-team" class="ts-team">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">Quality Service</h2>
                <h3 class="section-sub-title">Professional Team</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-lg-12">
                <div id="team-slide" class="team-slide">
                    @foreach ($teams as $team)
                        <div class="item">
                            <div class="ts-team-wrapper">
                                <div class="team-img-wrapper">
                                    <img loading="lazy" class="w-100" src="{{ asset("front/images/team/$team->image") }}"
                                        alt="team-img">
                                </div>
                                <div class="ts-team-content">
                                    <h3 class="ts-name">{{ "$team->name" }}</h3>
                                    <p class="ts-designation">{{ "$team->job" }}</p>
                                    <p class="ts-description">{{ "$team->title" }}</p>
                                    <div class="team-social-icons">
                                        <a target="_blank" href="{{"$setting->facebook"}}"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="{{"$setting->twitter"}}"><i class="fab fa-twitter"></i></a>
                                    </div>
                                    <!--/ social-icons-->
                                </div>
                            </div>
                            <!--/ Team wrapper end -->
                        </div><!-- Team 1 end -->
                    @endforeach

                </div><!-- Team slide end -->
            </div>
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</section>
<!--/ Team end -->

@endsection