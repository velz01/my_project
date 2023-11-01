@extends('layouts.main')
@section('content')
    <div class="mx-3">
            <div>{{ $post->id }}. {{ $post->title }}</div>
            <div>{{$post->content}}</div>
    </div>
    <div>
        <a href="{{ route('post.index') }}">Back</a>
    </div>
    <div>
        <a href="{{ route('post.edit', $post->id) }} " class="btn btn-primary mb-2">Edit post</a>
    </div>
    <div>
        <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
