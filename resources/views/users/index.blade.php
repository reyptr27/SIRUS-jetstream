<x-app-layout>

    @section('title', __('Manage Users'))

    <x-slot name="header">
        <div class="flex flex-col items-start">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Users') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">List of employee data at PT. Sinar Roda Utama.</p>
        </div>

        <div class="pt-7 flex flex-col items-start sm:pt-2 sm:items-end" >
            <x-button href="{{ route('teams.create') }}" variant="success"
                class="items-center max-w-xs">
                <span>Create New User</span>
            </x-button>
        </div>
    </x-slot>

    {{-- Content --}}
    
    
</x-app-layout>