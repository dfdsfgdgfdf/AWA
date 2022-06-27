@extends('layouts.frontend_app')

@section('title', 'Contact Us')

@section('content')



    <div class="contact py-4">
        <div class="container">
            <h5 data-aos="zoom-in-up" data-aos-duration="3000" class="text-center">Contact Us</h5>
            <!-- Start PageTile -->
            @php
                $pageTitles = \App\Models\PageTitle::whereStatus(1)
                    ->wherePage('اتصل بنا')
                    ->get();
            @endphp
            @if ($pageTitles->count() > 0)
                @foreach ($pageTitles as $pageTitle)
                    <p  data-aos="zoom-in-up" data-aos-duration="3000" class="text-center">{{ $pageTitle->title }}</p>
                @endforeach
            @endif
            <!-- End PageTile -->

            <div class="row pt-5">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="contact-sec" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                        data-aos-duration="2000">
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

                        <div class="row text-right pt-3 pr-2">
                            <div class="col">
                                <ul>
                                    <h5>العنوان : </h5>
                                    @foreach ($locations as $location)
                                        <li>
                                            <p>{{ $location->country }} - {{ $location->state }} -
                                                {{ $location->city }} </p>
                                        </li>
                                        <li>
                                            <p>{{ $location->description }}</p>
                                        </li>
                                    @endforeach

                                    <h5>الهواتف :  </h5>
                                    @foreach ($phones as $phone)
                                        <li>
                                            <p>{{ $phone->number }} </p>
                                        </li>
                                    @endforeach

                                    <h5>البريد الالكتروني :  </h5>
                                    @foreach ($emails as $email)
                                        <li>
                                            <a >{{ $email->email }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                @foreach ($socials as $social)
                                    <a href="{{ $social->link }}" target="_blank" class="social-link">
                                        <img src="{{ asset('images/icon/' . $social->type) . '.png' }}"  style="width: 50px; height: 50px;">
                                    </a>
                                @endforeach
                                @foreach ($whats as $what)
                                    <a href="https://wa.me/{{ $what->number }}" target="_blank" class="social-link">
                                        <img src="{{ asset('images/icon/' . $what->type) . '.png' }}"  style="width: 50px; height: 50px;">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="contact-sec" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                        data-aos-duration="2000">
                        <form action="{{ route('frontend.send-contact-message') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="full_name" value="{{ old('full_name') }}"
                                            class="form-control" required placeholder="الاسم">
                                        @error('full_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="company" value="{{ old('company') }}"
                                            class="form-control" placeholder="اسم الشركة (اختياري)">
                                        @error('company')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="country" value="{{ old('country') }}"
                                            class="form-control" required placeholder="الدولة">
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="mobile" value="{{ old('mobile') }}"
                                            class="form-control" required placeholder="رقم الهاتف">
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="note" rows="5" class="form-control"
                                            placeholder="هل هناك ملاحظات ؟">{!! old('note') !!}</textarea>
                                        @error('note')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="btn-sec text-center">
                                <button type="submit" name="submit">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @php
                $location = \App\Models\Location::whereStatus(1)->first();
            @endphp
            @if ($location)
                <div id="googleMap" style="width:100%; height:400px;" class="mt-5">
                    <iframe src="{{ $location->location }}" width="100%" height="100%" style="border:0;"
                        allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            @endif
        </div>
    </div>



@endsection
