@extends('layouts.admin_auth_app')

@section('title', 'About Us')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">About Us</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Add New Record</span>
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Vedio Src</th>
                    <th>Status</th>
                    <th class="text-center" style="width: 30px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($abouts as $about)
                    <tr>
                        <td>
                            @if($about->image != '')
                                <img class="rounded-circle" src="{{ asset($about->image) }}" width="60" height="60" alt="">
                            @else
                                <img class="rounded-circle" src="{{ asset('assets/no_image.png') }}" width="60" height="60" alt="">
                            @endif
                        </td>
                        <td>{{ $about->title }}</td>
                        <td>{{ $about->text }}</td>
                        @if($about->video_src != '')
                            <td>
                                <a href="{{ $about->video_src }}">Watch Video</a>
                            </td>
                        @else
                            <td>-</td>
                        @endif
                        <td>{{ $about->status == 1 ? 'Active' : 'Inactive'}}</td>
                        <td>
                            <div class="btn-group btn-group-md">
                                <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                <a href="javascript:void(0)"
                                    onclick="
                                            if (confirm('Are You Sure You Want To Delete This Record ?') )
                                                { document.getElementById('about_delete_{{ $about->id }}').submit(); }
                                            else
                                                { return false; }"
                                    class="btn btn-danger"><i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="post" id="about_delete_{{ $about->id }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No Records Found</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="7">
                        <div class="float-right">
                            {!! $abouts->appends(request()->input())->links() !!}
                        </div>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>


@endsection
