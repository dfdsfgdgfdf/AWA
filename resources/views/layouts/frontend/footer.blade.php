<!-- start footet -->
<div class="footer py-4">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 xol-sm-12 col-md-6 col-lg-6 text-right">
                <img src="{{ asset('frontend/images/865b19b3-6cdd-4284-a651-d7f5d0310f37.png') }}" />
                <!-- Start PageTile -->
                @php
                    $pageTitles = \App\Models\PageTitle::whereStatus(1)
                        ->wherePage('Footer')
                        ->get();
                @endphp
                @if ($pageTitles->count() > 0)
                    @foreach ($pageTitles as $pageTitle)
                        <p class="text-left">{{ $pageTitle->title }}</p>
                    @endforeach
                @endif
                <!-- End PageTile -->

                @php
                    $socials = \App\Models\SocialMedia::whereStatus(1)
                        ->orderBy('id', 'desc')
                        ->get();
                    $whats = \App\Models\Phone::whereType('WhatsApp')
                        ->whereStatus(1)
                        ->orderBy('id', 'desc')
                        ->get();
                    $phones = \App\Models\Phone::whereType('Phone')
                        ->whereStatus(1)
                        ->orderBy('id', 'desc')
                        ->get();
                    $emails = \App\Models\Email::whereStatus(1)
                        ->orderBy('id', 'desc')
                        ->get();
                    $locations = \App\Models\Location::whereStatus(1)
                        ->orderBy('id', 'desc')
                        ->get();

                @endphp
                @foreach ($socials as $social)
                    <a href="{{ $social->link }}" target="_blank">
                        <img src="{{ asset('images/icon/' . $social->type) . '.png' }}" style="width: 90px; height: 90px;">
                    </a>
                @endforeach
                @foreach ($whats as $what)
                    <a href="https://wa.me/{{ $what->number }}" target="_blank" class="social-link">
                        <img src="{{ asset('images/icon/' . $what->type) . '.png' }}" style="width: 90px; height: 90px;">
                    </a>
                @endforeach
            </div>
            <div class="col-xs-12 xol-sm-12 col-md-6 col-lg-6 text-center">
                <div class="row">
                    <div class="col">
                        <h4>Links</h4>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li><a href="{{ route('frontend.about-us') }}">About Us</a></li>
                            <li><a href="{{ route('frontend.our-work') }}">Our Work</a></li>
                            <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                        </ul>

                    </div>

                    <div class="col">
                        <h4>Contacts</h4>
                        <ul class="ul-contact">
                            @foreach ($emails as $email)
                                <li><p><i class="fas fa-envelope-open-text"></i>{{ $email->email }}</p></li>
                            @endforeach

                            @foreach ($phones as $phone)
                                <li>
                                    <p><i class="fas fa-phone"></i> {{ $phone->number }} </p>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="col">
                        <h4>Address</h4>
                        <ul>
                            @foreach ($locations as $location)
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i> {{ $location->country }} -
                                        {{ $location->state }} - {{ $location->city }} </p>
                                </li>
                            @endforeach

                        </ul>

                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
<!-- end footer -->
<!-- start copyright -->
<div class="copyright py-2 text-center">
    <div class="conatiner">
        <p style="direction: ltr;">DESIGN BY DELTANA - © 2019. ALL RIGHTS RESERVED.</p>
    </div>
</div>
<!-- end copyright -->
