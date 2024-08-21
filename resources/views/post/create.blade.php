<!-- resources/views/post/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <!-- Image de profil et titre -->
        <div class="flex items-center mb-4">
            <!-- Icône de profil -->
            <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/avatars/a_3_0.png" alt="Profile Image" class="w-10 h-10 rounded-full border-2 border-gray-300 mr-3">
            <!-- Texte à côté de l'icône avec le rappel du user name -->
            <h1 class="text-lg font-medium text-gray-600">Hi {{ Auth::user()->name }}</h1>
        </div>
    </x-slot>

    <div class="max-w-lg mx-auto mt-8">
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <h1 class="text-lg font-medium text-gray-700">Create a new post</h1>
            <br>
            <!-- Section title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="mt-1 block px-3 py-2 border-purple-500 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Section content -->
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea id="content" name="content" required class="mt-1 block w-3/4 px-8 py-6.5 border-purple-500 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Section images -->
            <div class="mb-4">
                <label for="images" class="block text-sm font-medium text-gray-700">Select Images</label>
                <input type="file" id="images" name="images[]" accept="image/*" multiple class="mt-1 block w-auto px-3 py-2 border border-purple-500 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Grid to display selected images -->
            <div id="image-preview" class="grid grid-cols-3 gap-2 mb-4">
            </div>

            <!-- Section button -->
            <div>
                <button type="submit" class="block text-sm font-medium text-gray-700 bg-white w-2/4 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-6 py-3.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Post
                </button>
            </div>
            <br>
        </form>
    </div>
</x-app-layout>
