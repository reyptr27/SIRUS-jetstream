<x-app-layout>

    @section('title', __('Dashboard'))

    <x-slot name="header">
        <div class="flex flex-col">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Home page of <span class="text-blue-600 font-bold">SIRUS</span> app.</p>
        </div>
    </x-slot>

    <div class="p-6 flex flex-col gap-6 overflow-hidden bg-white rounded-md shadow-md lg:flex-row md:justify-between dark:bg-dark-eval-1">
        <div>You're logged in!</div>

        <div>
            <a 
                href="https://jetstream.laravel.com/2.x/introduction.html"
                class="text-blue-600 hover:underline"
                target="_blank"
            >
                Jetstream Documentation
            </a>
        </div>
    </div>
</x-app-layout>