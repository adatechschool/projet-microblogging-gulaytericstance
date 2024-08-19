{{-- resources/views/post/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Create a New Post</h1>

    <form method="POST" action="{{ route('post.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" required>{{ old('content') }}</textarea>
            @error('content')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Create Post</button>
    </form>
@endsection