@extends('layouts.admin_auth_app')

@section('title', $projectDetail->title)

@section('content')

    <style>
        /* start projects-det */
        .projects-det h5 {
            text-align: center;
            font-weight: 600;
            color: #20406e;
            padding-bottom: 28px;
        }

        .projects-det ul {
            text-align: right;
            list-style: none;
        }

        .projects-det ul li p {
            font-size: 16px;
            color: #20406e;
            padding-bottom: 5px;
            font-weight: 600;
        }

        .projects-det ul li span {
            font-size: 14px;
            padding-right: 7px;
            font-weight: unset !important;
            color: #898989;
        }

        /* end projects-det */

    </style>
    <!-- start projects details -->
    <div class="projects-det py-4" style="direction: rtl">
        <div class="container">
            <h5>{{ $projectDetail->title }}</h5>
            <div class="row">
                <div class="col-6">
                    <ul>
                        <li>
                            <p>إيجار|بيع:<span>{{ $projectDetail->purpose == 'Sale' ? 'بيع' : 'إيجار' }}</span></p>
                        </li>
                        <li>
                            <p>الحالة:<span>{{ $projectDetail->purpose == 'Used' ? 'مستخدم' : 'جديد' }}</span></p>
                        </li>
                        <li>
                            <p>الطابق:<span>{{ $projectDetail->floornumber }}</span></p>
                        </li>
                        <li>
                            <p>المصعد:<span>{{ $projectDetail->elevator == '1' ? 'نعم' : 'لا يوجد' }}</span></p>
                        </li>
                        <li>
                            <p>غرف النوم:<span>{{ $projectDetail->bedroom }}</span></p>
                        </li>
                        <li>
                            <p>مميز:<span>{{ $projectDetail->top == '1' ? 'نعم' : 'لا' }}</span></p>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul>
                        <li>
                            <p>السعر:<span>{{ $projectDetail->price }}$</span></p>
                        </li>
                        <li>
                            <p>المساحة:<span>{{ $projectDetail->size }}</span></p>
                        </li>
                        <li>
                            <p>عدد الأدوار<span>{{ $projectDetail->no_of_floor }}</span></p>
                        </li>
                        <li>
                            <p>غرف الجلوس:<span>{{ $projectDetail->hall }}</span></p>
                        </li>
                        <li>
                            <p>الحمامات:<span>{{ $projectDetail->bathroom }}</span></p>
                        </li>
                        <li>
                            <p>فيديو:<a href="{{ $projectDetail->video }}" target="_blank"
                                    style="color:blue">{{ $projectDetail->video != '' ? 'مشاهدة' : '' }}</a></p>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <ul>
                        <li>
                            <p>الهاتف:<span>{{ $projectDetail->phone }}</span></p>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <ul>
                        <li>
                            <p>وصف العقار:<span>{{ $projectDetail->description }}</span></p>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <ul>
                        <li>
                            <p>وصف العنوان:<span>{{ $projectDetail->address }}</span></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end projects details -->


    <!--start image gallery-->
    <div class="image-gallery py-4">
        <div class="container">
            <div class="start-imag">
                <div class="row mt-4">

                    <div class="item col-sm-6 col-md-4 mb-3">
                        <a class="fancybox" data-fancybox="gallery1">
                            <img src="{{ asset($projectDetail->image) }}" width="100%" height="100%" />
                        </a>
                    </div>

                    @if ($projectDetail->media()->count() > 0)
                        @foreach ($projectDetail->media as $media)
                            <div class="item col-sm-6 col-md-4 mb-3">
                                <a class="fancybox" data-fancybox="gallery1">
                                    <img src="{{ asset($media->file_name) }}" width="100%" height="100%" />
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end image gallery-->
    <!-- start details -->
    <div class="details-pro py-4">
        <div class="container">
            <iframe src="{{ $projectDetail->link }}" width="100%" height="450" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>

    </div>
    <!-- end details -->



@endsection
