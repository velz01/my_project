@extends('layouts.main')
@section('content')
{{--    <div class="container">--}}
        <form action="{{ route('post.store') }}" method="post" class="w-25">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{ old('title') }}" type="text" placeholder="Title" name="title" class="form-control" id="title">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" name="content" placeholder="Content" class="form-control" id="content">{{ old('content') }}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3 form-group">
                <label for="category" class="form-label">Categories</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-primary ">Create</button>
        </form>
{{--    </div>--}}
@endsection
