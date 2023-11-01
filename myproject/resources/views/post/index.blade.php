@extends('layouts.main')
@section('content')
    <div>
        <a href="{{ route('post.create') }} " class="btn btn-primary mb-2">Add post</a>
    </div>
    <div class="mx-3">
        @foreach($posts as $post)
            <div><a href="{{route('post.show', $post->id)}}">{{ $post->id }}. {{ $post->title }}</a></div>
        @endforeach
    </div>
@endsection
