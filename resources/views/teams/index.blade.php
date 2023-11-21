<x-app-layout>

    @section('title', __('Manage Teams'))

    <x-slot name="header">

        <div class="flex flex-col">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Teams') }}
                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">5 Teams</span>
            </h2>
            {{-- if admin --}}
            {{-- <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">List of data for all teams at PT. Sinar Roda Utama.</p> --}}
            {{-- if user --}}
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">List of team data that you are in.</p>
        </div>
       
    </x-slot>

    {{-- Content --}}
    <livewire:teams.teams-table />
   
</x-app-layout>