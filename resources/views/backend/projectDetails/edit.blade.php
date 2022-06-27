@extends('layouts.admin_auth_app')

@section('title', 'Edit Project Details')


@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit Project Details</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.our-work.projectDetails.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Project Details</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.our-work.projectDetails.update', $projectDetail->id) }}"  method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row mt-4">
                    <div class="col-9">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ old('title', $projectDetail->title ) }}" class="form-control" required>
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-3">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $projectDetail->phone) }}" class="form-control" required>
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-12">
                        <label for="image">Logo</label>
                        <input type="file" name="image" id="project_logo" class="file-input-overview">
                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label for="category">Category</label>
                        <input type="text" name="category" value="{{ old('category', $projectDetail->category ) }}" class="form-control" required>
                        @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-4">
                        <label for="top">Top</label>
                        <select name="top" class="form-control">
                            <option value="1" {{ old('top', $projectDetail->top ) == 1 ? 'selected' : null }}>Top</option>
                            <option value="0" {{ old('top', $projectDetail->top ) == 0 ? 'selected' : null }}>Normal</option>
                        </select>
                        @error('top')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-4">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $projectDetail->status ) == 1 ? 'selected' : null }}>Active</option>
                            <option value="0" {{ old('status', $projectDetail->status ) == 0 ? 'selected' : null }}>Inactive</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mt-4 col-3">
                        <label for="purpose">Purpose</label>
                        <select name="purpose" class="form-control">
                            <option value="Sale" {{ old('purpose', $projectDetail->purpose) == 'Sale' ? 'selected' : null }}>Sale</option>
                            <option value="Rent" {{ old('purpose', $projectDetail->purpose) == 'Rent' ? 'selected' : null }}>Rent</option>
                        </select>
                        @error('purpose')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-3">
                        <label for="price">Price</label>
                        <input type="number" name="price" value="{{ old('price', $projectDetail->price) }}" class="form-control">
                        @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-3">
                        <label for="size">Size</label>
                        <input type="number" name="size" value="{{ old('size', $projectDetail->size) }}" class="form-control">
                        @error('size')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-3">
                        <label for="used">Used | New</label>
                        <select name="used" class="form-control">
                            <option value="Used" {{ old('used', $projectDetail->used) == 'Used' ? 'selected' : null }}>Used</option>
                            <option value="New" {{ old('used', $projectDetail->used) == 'New' ? 'selected' : null }}>New</option>
                        </select>
                        @error('used')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>




                    <div class="mt-4 col-2">
                        <label for="floornumber">Floor Number(رقم الطابق)</label>
                        <input type="number" name="floornumber" value="{{ old('floornumber', $projectDetail->floornumber) }}" class="form-control">
                        @error('floornumber')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="no_of_floor">No.Of.Floor(عدد الادوار)</label>
                        <input type="number" name="no_of_floor" value="{{ old('no_of_floor', $projectDetail->no_of_floor) }}" class="form-control">
                        @error('no_of_floor')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="elevator">Elevator(مصعد)</label>
                        <select name="elevator" class="form-control">
                            <option value="1" {{ old('elevator', $projectDetail->elevator) == 1 ? 'selected' : null }}>YES</option>
                            <option value="0" {{ old('elevator', $projectDetail->elevator) == 0 ? 'selected' : null }}>NO</option>
                        </select>
                        @error('elevator')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="bedroom">Bedroom</label>
                        <input type="number" name="bedroom" value="{{ old('bedroom', $projectDetail->bedroom) }}" class="form-control">
                        @error('bedroom')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="bathroom">Bathroom</label>
                        <input type="number" name="bathroom" value="{{ old('bathroom', $projectDetail->bathroom) }}" class="form-control">
                        @error('bathroom')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="hall">living room</label>
                        <input type="number" name="hall" value="{{ old('hall', $projectDetail->hall) }}" class="form-control">
                        @error('hall')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>


                    <div class="mt-4 col-12">
                        <label for="video">Demo Video</label>
                        <input type="url" name="video" value="{{ old('video', $projectDetail->video) }}" class="form-control">
                        @error('video')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-12">
                        <label for="description">Description</label>
                        <textarea name="description" rows="5" class="form-control" required>{!! old('description', $projectDetail->description) !!}</textarea>
                        @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mt-4 col-12">
                        <label for="link">Location Link</label>
                        <input type="url" name="link" value="{{ old('link', $projectDetail->link) }}" class="form-control">
                        @error('link')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-12">
                        <label for="address">Address</label>
                        <textarea name="address" rows="5" class="form-control" required>{!! old('address', $projectDetail->address) !!}</textarea>
                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row pt-4 mt-4">
                    <div class="col-12">
                        <div class="form-group file-loading">
                            <label for="images">Project Details Images</label>
                            <input type="file" name="images[]" id="project_images" class="file-input-overview" multiple="multiple" >
                            @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Project Details</button>
                </div>
            </form>
        </div>
    </div>



    @endsection

    @section('script')
        <script>
            $(function() {
                $('#project_images').fileinput({
                    theme: "fas",
                    maxFileCount: {{ 10 - $projectDetail->media->count() }},
                    allowedFileTypes: ['image'],
                    showCancel: true,
                    showRemove: false,
                    showUpload: false,
                    overwriteInitial: false,
                    initialPreview: [
                        @if($projectDetail->media->count() > 0)
                            @foreach($projectDetail->media as $media)
                                "{{url($media->file_name)}}",
                            @endforeach
                        @endif
                    ],
                    initialPreviewAsData: true,
                    initialPreviewFileType: 'image',
                    initialPreviewConfig: [
                        @if($projectDetail->media->count() > 0)
                            @foreach($projectDetail->media as $media)
                                {
                                    caption: "{{ $media->file_name }}",
                                    size: {{ $media->file_size }},
                                    width: "120px",
                                    url: "{{ route('admin.our-work.projectDetails.removeImages', ['image_id'=>$media->id, 'projectDetail_id'=>$projectDetail->id, '_token' => csrf_token()]) }}",
                                    key: "{{ $media->id }}"
                                },
                            @endforeach
                        @endif
                    ],
                    // on('filesorted', function(event, params){
                    //     console;log
                    // })
                });


                $('#project_logo').fileinput({
                    theme: "fas",
                    maxFileCount: 1,
                    allowedFileTypes: ['image'],
                    showCancel: true,
                    showRemove: false,
                    showUpload: false,
                    overwriteInitial: false,
                    initialPreview:[
                        @if ($projectDetail->image != '')
                            "{{url($projectDetail->image)}}"
                        @endif
                    ],
                    initialPreviewAsData: true,
                    initialPreviewFileType: 'image',
                    initialPreviewConfig: [
                        @if ($projectDetail->image != '')
                        {
                            caption: "{{ $projectDetail->image }}",
                            size: '1000',
                            width: "120px",
                            url: "{{ route('admin.our-work.projectDetails.removeImage', ['projectDetail_id'=>$projectDetail->id, '_token' => csrf_token()]) }}",
                            key: "{{ $projectDetail->id }}"
                        },
                        @endif
                    ],
                });
            });
        </script>
    @endsection

