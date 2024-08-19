<!-- resources/views/post/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>All Posts</h1>
    @foreach ($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
@endsection