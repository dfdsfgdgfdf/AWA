@extends('layouts.admin_auth_app')

@section('title', 'Edit Page-Titles')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit Page-Titles</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.page-titles.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Page-Titles</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.page-titles.update', $pageTitle->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-9">
                        <label for="page">Page</label>
                        <select name="page" class="form-control">
                            <option value="الرئيسية (خدماتنا)" {{ old('page', $pageTitle->page ) == "الرئيسية (خدماتنا)" ? 'selected' : null }}>الرئيسية (خدماتنا)</option>
                            <option value="الرئيسية (اعمالنا)" {{ old('page', $pageTitle->page ) == "الرئيسية (اعمالنا)" ? 'selected' : null }}>الرئيسية (اعمالنا)</option>
                            <option value="اعمالنا" {{ old('page', $pageTitle->page ) == "اعمالنا" ? 'selected' : null }}>اعمالنا</option>
                            <option value="اتصل بنا" {{ old('page', $pageTitle->page ) == "اتصل بنا" ? 'selected' : null }}>اتصل بنا</option>
                            <option value="Footer" {{ old('page', $pageTitle->page ) == "Footer" ? 'selected' : null }}>Footer</option>
                        </select>
                        @error('page')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $pageTitle->status ) == 1 ? 'selected' : null }}>Active</option>
                            <option value="0" {{ old('status', $pageTitle->status ) == 0 ? 'selected' : null }}>Inactive</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <label for="title">Title</label>
                        <textarea name="title" rows="5" class="form-control" >{!! old('title', $pageTitle->title ) !!}</textarea>
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Page-Title</button>
                </div>
            </form>
        </div>
    </div>



@endsection
