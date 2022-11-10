<section id="project-area" class="project-area solid-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">Work of Excellence</h2>
                <h3 class="section-sub-title">Recent Projects</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-12">
                <div class="shuffle-btn-group">
                    <label class="active" for="all">
                        <button type="submit" class="btn btn-primary" ><a
                            href="{{ route('front.projects-list') }}">Show All</a></button>
                    </label>
                    @foreach ($projects as $project)
                        <label for="{{ $project->name }}" class="">
                            <button type="submit" class="btn btn-primary" href="{{ route("front.projects-single",$project->id)}}"><a
                                href="{{ route('front.projects-single', $project->id) }}">{{ $project->name }}</a></button>
                        </label>
                    @endforeach
                </div><!-- project filter end -->


                <div class="row shuffle-wrapper">
                    <div class="col-1 shuffle-sizer"></div>

                    @foreach ($projects as $project)
                        @foreach ($project->services as $service)
                            <div class="col-lg-4 col-md-6 shuffle-item"
                                data-groups="[&quot;{{ $project->name }}&quot;]">
                                <div class="project-img-container">
                                    <a class="gallery-popup" href="{{ route('front.projects-single', $project->id) }}"
                                        aria-label="project-img">
                                        <img class="img-fluid" src="{{ asset("storage/projects/$project->image") }}"
                                            alt="project-img">
                                    </a>
                                    <div class="project-item-info">
                                        <div class="project-item-info-content">
                                            <h3 class="project-item-title">
                                                <a
                                                    href="{{ route('front.projects-single', $project->id) }}">{{ $service->name }}</a>
                                            </h3>
                                            <p class="project-cat">{{ $project->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- shuffle item 1 end -->
                            <!-- shuffle item 1 end -->
                        @endforeach
                    @endforeach
                    {{-- @endif --}}

                </div>
                <div class="col-12">
                    <div class="general-btn text-center">
                        <a class="btn btn-primary" href="{{ route('front.projects-list') }}">View All Projects</a>
                    </div>
                </div>
            </div><!-- Content row end -->
        </div>
    </div>
        <!--/ Container end -->
</section><!-- Project area end -->
