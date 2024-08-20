@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 border border-gray-200 rounded-2xl shadow-lg mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $user->name }}</h1>
            <p class="text-gray-600 mb-4"><strong>Email:</strong> 
               <a href="mailto:{{ $user->email }}"> {{ explode('@', $user->email)[0] }}@****
               </a>
            </p>

            <p class="text-gray-600 mb-4"><strong>Joined:</strong> {{ $user->created_at->format('l, F j, Y') }}</p>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Posts by {{ $user->name }}</h2>
            @if ($user->posts->isEmpty())
                <p class="text-gray-600">This user has not posted anything yet.</p>
            @else
                @foreach ($user->posts as $post)
                    <div class="post mb-6 p-6 bg-white border border-gray-200 rounded-2xl shadow-lg">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h3>
                        <p class="text-gray-600">{{ $post->content }}</p>
                        <p class="text-gray-500 mt-4">Posted on: {{ $post->created_at->format('l, F j, Y') }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
