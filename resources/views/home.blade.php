@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white mb-8 text-center">All Posts</h1>

        @foreach ($posts as $post)
            <div class="post mb-6 p-6 bg-white border border-gray-200 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 max-w-lg mx-auto">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                <p class="text-gray-600 mt-4">{{ $post->content }}</p>
                <p class="text-gray-500 mt-4">Posted by: @if ($post->user)
                    <a href="{{ route('users.show', $post->user->id) }}" class="text-blue-500 hover:underline">{{ $post->user->name }}</a>
                    @else
                        <span class="text-gray-500">Unknown</span>
                    @endif
                </p>

            </div>
        @endforeach
    </div>
@endsection
