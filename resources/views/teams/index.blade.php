<x-app-layout>

    @section('title', __('Manage Teams'))

    <x-slot name="header">
        <div class="flex flex-col items-start">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Teams') }}
                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">5 Teams</span>
            </h2>
            {{-- if admin --}}
            {{-- <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">List of data for all teams at PT. Sinar Roda Utama.</p> --}}
            {{-- if user --}}
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">List of team data that you are in.</p>
        </div>

        <div class="pt-7 flex flex-col items-start sm:pt-2 sm:items-end" >
            <x-button href="{{ route('teams.create') }}" variant="success"
                class="items-center max-w-xs">
                <span>Create New Team</span>
            </x-button>
        </div>

        {{-- <div class="pt-7 flex flex-col items-start sm:pt-2 sm:items-end" >
             <x-button variant="danger" 
                x-on:click="$wire.$deleteSelected()"
                wire:confirm="Are you sure you want to delete this team's?"
                class="items-center max-w-xs">

                <span>Bulk Delete</span>
                
             </x-button>
        </div> --}}

    </x-slot>

    {{-- Content --}}
    <livewire:teams-table />
   
</x-app-layout>