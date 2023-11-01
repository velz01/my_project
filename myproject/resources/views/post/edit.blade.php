@extends('layouts.main')
@section('content')
    <div class="mx-3">
            <div>{{ $post->id }}. {{ $post->title }}</div>
    </div>
    <div>
        <a href="{{ route('post.index') }}">Back</a>
    </div>
    <form action="{{ route('post.update', $post->id) }}" method="post" class="w-25">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" name="content" class="form-control" id="content">{{$post->content}}</textarea>
        </div>
        <div class="mb-3 form-group">
            <label for="category" class="form-label">Categories</label>
            <select class="form-control form-select" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{$category->id === $post->category->id ? 'selected': ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{$tag->id === $postTag->id ? 'selected': ''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

@endsection
