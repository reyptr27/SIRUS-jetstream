<x-app-layout>

    @section('title', __('Create New Team'))

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Team') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Page to create a new team.</p>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('teams.create-team-form')
        </div>
    </div>
</x-app-layout>
