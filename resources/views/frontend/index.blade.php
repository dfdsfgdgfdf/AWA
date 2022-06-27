@extends('layouts.frontend_app')

@section('title', 'HOME')

@section('content')

    <style>
        .carousel {
            position: relative;
        }

        .carousel-caption {
            position: absolute;
            background: rgba(0, 0, 0, 0.4);
            padding: 15px 10px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

    </style>
    <!-- start slider -->
    <div class="slider-sec">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($sliders as $slider)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->title }}</h5>
                            <p>{{ $slider->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- end slider -->



    <!-- start about -->
    <div class="about-sec py-4">
        <div class="container">
            <h5>About Us</h5>

            @foreach ($projects as $project)
                @if (($loop->index + 1) % 2 != 0)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                            <h6 class="text-right" data-aos="flip-right" data-aos-easing="ease-out-cubic"
                                data-aos-duration="2000">{{ $project->title }}</h6>
                            <br>
                            <p class="text-right" data-aos="flip-right" data-aos-easing="ease-out-cubic"
                                data-aos-duration="2000">{{ $project->text }}</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                            <img src="{{ asset($project->image) }}" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                                data-aos-duration="2000">
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                            <img src="{{ asset($project->image) }}" data-aos="flip-right" data-aos-easing="ease-out-cubic"
                                data-aos-duration="2000" />
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                            <h6 class="text-right" data-aos="flip-right" data-aos-easing="ease-out-cubic"
                                data-aos-duration="2000">{{ $project->title }}</h6>
                            <br>
                            <p class="text-right" data-aos="flip-right" data-aos-easing="ease-out-cubic"
                                data-aos-duration="2000">{{ $project->text }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- end about -->



    <!-- start services -->
    <div class="services  py-3">
        <div class="container mt-3 mb-3">
            <h6>Our Services</h6>
            <!-- Start PageTile -->
            @php
                $pageTitles = \App\Models\PageTitle::whereStatus(1)
                    ->wherePage('الرئيسية (خدماتنا)')
                    ->get();
            @endphp
            @if ($pageTitles->count() > 0)
                @foreach ($pageTitles as $pageTitle)
                    <p class="text-center">{{ $pageTitle->title }}</p>
                @endforeach
            @endif
            <!-- End PageTile -->

            <div class="row" data-aos="fade-up">

                @foreach ($services as $service)
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mt-3 mb-3">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset($service->image) }}" class="card-img-top" alt="..." height="250px">
                        <a href="/homeServices/{{ $service->id }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->title }}</h5>
                                <p class="card-text">{{ $service->text }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end services -->


    <!-- start ourprojects -->
    <div class="images-sec py-4">
        <div class="container">
            <h6>Our Work</h6>
            <!-- Start PageTile -->
            @php
                $pageTitles = \App\Models\PageTitle::whereStatus(1)
                    ->wherePage('الرئيسية (اعمالنا)')
                    ->get();
            @endphp
            @if ($pageTitles->count() > 0)
                @foreach ($pageTitles as $pageTitle)
                    <p class="text-center">{{ $pageTitle->title }}</p>
                @endforeach
            @endif
            <!-- End PageTile -->
            <div class="row" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">

                @foreach ($topProjects as $project)
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-3 mb-3">
                        <div class="container22">
                            <img src="{{ asset($project->image) }}" alt="Avatar" class="image">
                            <div class="overlay">
                                <div class="text">
                                    <a href="/project-details/{{ $project->id }}">{{ $project->title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="button-sec py-3">
                <button onclick="window.location.href='{{ route('frontend.our-work') }}'">More</button>

            </div>
        </div>

    </div>
    <!-- end ourprojects -->

@endsection
