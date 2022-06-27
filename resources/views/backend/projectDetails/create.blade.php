@extends('layouts.admin_auth_app')

@section('title', 'Create Project Details')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Create Project</h6>
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

            <form action="{{ route('admin.our-work.projectDetails.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <div class="mt-4 col-9">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-3">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required>
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="mt-4 col-12">
                        <label for="image">Logo</label>
                        <input type="file" name="image" id="project_logo" class="file-input-overview"  required>
                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="mt-4 col-4">
                        <label for="category">Category</label>
                        <input type="text" name="category" value="{{ old('category') }}" class="form-control" placeholder="Ecommerce, Real_State, App,......." required>
                        @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-4">
                        <label for="top">Top</label>
                        <select name="top" class="form-control">
                            <option value="1" {{ old('top') == 1 ? 'selected' : null }}>Top</option>
                            <option value="0" {{ old('top') == 0 ? 'selected' : null }}>Normal</option>
                        </select>
                        @error('top')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-4">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status') == 1 ? 'selected' : null }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : null }}>Inactive</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>


                    <div class="mt-4 col-3">
                        <label for="purpose">Purpose</label>
                        <select name="purpose" class="form-control">
                            <option value="Sale" {{ old('purpose') == 'Sale' ? 'selected' : null }}>Sale</option>
                            <option value="Rent" {{ old('purpose') == 'Rent' ? 'selected' : null }}>Rent</option>
                        </select>
                        @error('purpose')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-3">
                        <label for="price">Price</label>
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                        @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-3">
                        <label for="size">Size</label>
                        <input type="number" name="size" value="{{ old('size') }}" class="form-control">
                        @error('size')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-3">
                        <label for="used">Used | New</label>
                        <select name="used" class="form-control">
                            <option value="Used" {{ old('used') == 'Used' ? 'selected' : null }}>Used</option>
                            <option value="New" {{ old('used') == 'New' ? 'selected' : null }}>New</option>
                        </select>
                        @error('used')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>




                    <div class="mt-4 col-2">
                        <label for="floornumber">Floor Number(رقم الطابق)</label>
                        <input type="number" name="floornumber" value="{{ old('floornumber') }}" class="form-control">
                        @error('floornumber')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="no_of_floor">No.Of.Floor(عدد الادوار)</label>
                        <input type="number" name="no_of_floor" value="{{ old('no_of_floor') }}" class="form-control">
                        @error('no_of_floor')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="elevator">Elevator(مصعد)</label>
                        <select name="elevator" class="form-control">
                            <option value="1" {{ old('elevator') == 1 ? 'selected' : null }}>YES</option>
                            <option value="0" {{ old('elevator') == 0 ? 'selected' : null }}>NO</option>
                        </select>
                        @error('elevator')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="bedroom">Bedroom</label>
                        <input type="number" name="bedroom" value="{{ old('bedroom') }}" class="form-control">
                        @error('bedroom')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="bathroom">Bathroom</label>
                        <input type="number" name="bathroom" value="{{ old('bathroom') }}" class="form-control">
                        @error('bathroom')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-2">
                        <label for="hall">living room</label>
                        <input type="number" name="hall" value="{{ old('hall') }}" class="form-control">
                        @error('hall')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>


                    <div class="mt-4 col-12">
                        <label for="video">Demo Video</label>
                        <input type="url" name="video" value="{{ old('video') }}" class="form-control">
                        @error('video')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-12">
                        <label for="description">description</label>
                        <textarea name="description" rows="5" class="form-control" required>{!! old('description') !!}</textarea>
                        @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mt-4 col-12">
                        <label for="link">Location Link</label>
                        <input type="url" name="link" value="{{ old('link') }}" class="form-control">
                        @error('link')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-4 col-12">
                        <label for="address">Address</label>
                        <textarea name="address" rows="5" class="form-control" required>{!! old('address') !!}</textarea>
                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row pt-4 mt-4">
                    <div class="mt-4 col-12">
                        <div class="form-group file-loading">
                            <label for="images">Project Details Images</label>
                            <input type="file" name="images[]" id="project_images" class="file-input-overview" multiple="multiple" required>
                            @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Add Project</button>
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
                maxFileCount: 10,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });
        });

        $(function () {
            $('#project_logo').fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });
        });

    </script>
@endsection
