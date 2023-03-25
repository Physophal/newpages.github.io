@extends('layouts.Admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Edit Category
                    <a  href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input  type="text" name="name" value="{{ $category->name }}" class="form-control"/>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input  type="text" name="slug" value="{{ $category->slug }}" class="form-control"/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" row="3">{{ $category->description }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input  type="file" name="image" class="form-control"/>
                            <img src="{{ asset('/uploads/category/'.$category->image) }}" width="60px" height="80"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br/>
                            <input  type="checkbox" value="{{ $category->status == '1' ? 'checked':''}}"name="status" />
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Meta_Title</label>
                            <textarea name="meta_title" class="form-control" row="3">{{ $category->meta_title }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta_Keyword</label>
                            <textarea name="meta_keyword" class="form-control" row="3">{{ $category->meta_keyword }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta_Description</label>
                            <textarea name="meta_description" class="form-control" row="3">{{ $category->meta_description }}</textarea>
                        </div>

                        <div class="col-md-12 md-3">
                            <button type="submit" class="btn btn-primary">Update

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
