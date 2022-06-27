@extends('layouts.frontend_app')

@section('title', 'ABOUT US')

@section('content')

    <!-- start about -->
    <div class="about-sec py-4">
        <div class="container">
            <h5>About Us</h5>
            <!-- start video sec  -->
            @foreach ($projects as $project)
                @if (($loop->index + 1) % 2 != 0)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3 text-right">
                            <h4 data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000">{{ $project->title }}</h4>
                            <br>
                            <p data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000">{{ $project->text }}</p>
                        </div>
                        @if ($project->image != null)
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                                <img src="{{ asset($project->image) }}" data-aos="flip-left"
                                    data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                            </div>
                        @else
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3" style="height: 100%">
                                <iframe width="100%" height="280" src="{{ $project->video_src }}"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                        @endif
                    </div>
                @else
                <div class="row">
                    @if ($project->image != null)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3">
                            <img src="{{ asset($project->image) }}" data-aos="flip-left"
                                data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                        </div>
                    @else
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3" style="height: 100%">
                            <iframe width="100%" height="280" src="{{ $project->video_src }}"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
                    @endif
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 mb-3 text-right">
                        <h4 data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000">{{ $project->title }}</h4>
                        <br>
                        <p data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000">{{ $project->text }}</p>
                    </div>
                </div>
                @endif
            @endforeach


            <!-- end video sec -->
            @php
                $location = \App\Models\Location::whereStatus(1)->first();
            @endphp
            @if ($location)
                <div id="googleMap" style="width:100%; height:400px;" class="mt-5">
                    <iframe
                        src="{{ $location->location }}"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            @endif
        </div>
    </div>
    <!-- end about -->


@endsection
