@extends('layouts.frontend_app')

@section('title', $service->title)

@section('content')

    <div class="container mt-2">
        @if ($service->image)
            <img src="{{ asset($service->image) }}" style="width: 100%;" />
        @else
            <img src="{{ asset('image/news/default.jpg') }}" style="width: 100%;" />
        @endif
    </div>

    <div class="container mt-5 mb-5">
        <h5 data-aos="zoom-in-up" data-aos-duration="3000" class="text-center">{{ $service->title }}</h5>
        <p data-aos="zoom-in-up" data-aos-duration="3000" class="text-center">{{ $service->text }}</p>
    </div>

@endsection
