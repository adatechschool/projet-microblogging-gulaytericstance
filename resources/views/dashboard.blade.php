<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Contenu principal de la page -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <!-- Votre contenu ici -->
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <!-- Affichage de la biographie -->
                <div class="p-6 text-white">
                    <h3 class="text-lg font-medium text-gray-800 dark:text-white">Your Biography</h3>
                    <p>{{ $user->biography }}</p>
                </div>

                <!-- Formulaire de mise à jour de la biographie -->
                <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-md">
                    <h3 class="block text-gray-800 dark:text-white">Edit Your Biography</h3>
                    <form method="POST" action="{{ route('update.biography') }}">
                        @csrf
                        <div class="mt-4">
                            <textarea id="biography" name="biography" rows="4" class="w-full mt-1 p-2 border border-gray-300 rounded-md dark:bg-gray-900 dark:border-gray-600 dark:text-gray-100">{{ old('biography', $user->biography) }}</textarea>
                            @error('biography')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="mt-4 bg-blue-500 text-dark font-semibold py-2 px-4 rounded-md border border-blue-700 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Update Biography
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session('status') === 'biography-updated')
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-400" role="alert">
            {{ __('Biography updated successfully!') }}
        </div>
    @endif
</x-app-layout>
