<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-white dark:text-white">
                    <h3 class="text-lg font-medium">Your Biography</h3>
                    <p>{{ $user->biography }}</p>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium">Your Information</h3>
                    <ul>
                        <li><strong>Name:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        {{-- d'autres info?? --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- resources/views/post/create.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="bg-white text-black font-semibold py-2 px-4 rounded hover:bg-blue-600 place-content-center focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 md:focus:text-red-600 "><h1>Create your biography</h1>
        
        <form method="POST" action="{{ route('post.store') }}">
        @csrf
        <div>
            <label for="title">Express yourself</label>
            <input type="text" id="biography" name="biography" value="{{ old('biography') }}" required>
            @error('biography')
                <p>{{ $text }}</p>
            @enderror
        </div>
        
      <button type="submit" class="bg-white text-black font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 md:focus:text-red-600">
    Create biography
</button>

    </form>
@endsection
</x-app-layout>
