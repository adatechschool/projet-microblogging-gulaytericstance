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
      <button type="submit" class="bg-white text-black font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 md:focus:text-red-600">
    Create Post
</button>

    </form>
@endsection