@extends('layouts.frontend_app')

@section('title', 'OUR WORK')

@section('content')


    <!-- start ourprojects -->
    <div class="images-sec py-4">
        <div class="container">
            <h6 data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">Our Work</h6>
            <!-- Start PageTile -->
            @php
                $pageTitles = \App\Models\PageTitle::whereStatus(1)
                    ->wherePage('Our Projects')
                    ->get();
            @endphp
            @if ($pageTitles->count() > 0)
                @foreach ($pageTitles as $pageTitle)
                    <p class="text-center" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">{{ $pageTitle->title }}</p>
                @endforeach
            @endif

            <div class="row" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                @foreach ($allProjects as $allProject)
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-3 mb-3">
                        <div class="container22">
                            <img src="{{ asset($allProject->image) }}" alt="Avatar" class="image">
                            <div class="overlay">
                                <div class="text">
                                    <a href="/project-details/{{ $allProject->id }}">{{ $allProject->title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="button-sec py-3">
                {{ $allProjects->links() }}
            </div>
        </div>
    </div>
    <!-- end ourprojects -->











@endsection
