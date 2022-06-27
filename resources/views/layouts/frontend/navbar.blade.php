<!-- start navbar -->
<div class="navbar-sec">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('frontend.index') }}"><img src="{{ asset('frontend/images/865b19b3-6cdd-4284-a651-d7f5d0310f37.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('frontend.index') }}">Home<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.about-us') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.our-work') }}">Our Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.contact') }}">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>

</div>
<!-- end navbar -->


@php
    $whats = \App\Models\Phone::whereType('WhatsApp')
        ->whereStatus(1)
        ->orderBy('id', 'desc')
        ->first();
@endphp
<a href="https://wa.me/{{ $whats != '' ? $whats->number : '' }}" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>
{{-- <a href="#" class="float1" target="_blank">
    <i class="fas fa-file-download my-float1"></i>
</a> --}}
