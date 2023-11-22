<div>
    <div class="flex justify-center sm:justify-between mb-5 items-center">

        {{-- <x-button size="sm" variant="danger" 
            class="items-center max-w-xs mx-1 gap-2"
            wire:click="deleteSelected"
            wire:confirm="Are you sure you want to delete this team's?">
        
            <x-heroicon-o-trash class="w-6 h-6" aria-hidden="true" />
            <span>{{ __('Delete Selected') }}</span>
           
        </x-button> --}}
        
        <x-button href="{{ route('teams.create') }}" size="sm" variant="primary"
            class="items-center max-w-xs mx-1 gap-2">

                <x-heroicon-o-plus class="w-6 h-6" aria-hidden="true" />
                <span>{{ __('Create Team') }}</span>
                
        </x-button>


    </div>

    <div class="p-7 overflow-hidden rounded-md shadow-md bg-white  dark:bg-dark-eval-1">
        <!-- Table component -->
        <section class="mx-auto">
 
            <div class="flex justify-between pb-5">
               <div>
                <x-span>Filter</x-span>
               </div>
            
                <div>
                    <x-label for="table-search" class="sr-only">{{ __('Search Data') }} </x-label>   

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-magnifying-glass aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="table-search" name="table-search" class="form-input block w-40 sm:w-60" type="text" placeholder="{{ __('Search Data') }}" />
                    </x-input-with-icon-wrapper>
                </div>

            </div>
    
            <div class="overflow-hidden overflow-x-auto min-w-full align-middle rounded-md">
                <table class="min-w-full border divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 w-10 text-xs font-medium text-left rtl:text-right bg-gray-50 text-gray-500">
                                <div class="flex items-center gap-x-3">
                                    <x-checkbox id="selectAll" wire:model="selectAll" wire:click="toggleSelectAll" />
                                    <button class="flex items-center gap-x-2">
                                        <span class="uppercase tracking-wider leading-4 text-gray-500">Id</span>

                                        <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                        </svg>
                                    </button>
                                </div>
                            </th>
                            <th class="px-6 py-3 w-10 text-left bg-gray-50 ">
                            </th>
                            <th scope="col" class="px-6 py-3 w-10 text-xs font-medium text-left rtl:text-right bg-gray-50 text-gray-500">
                                <div class="flex items-center gap-x-3">
                                    <button class="flex items-center gap-x-2">
                                        <span class="uppercase tracking-wider leading-4 text-gray-500">Name</span>

                                        <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                        </svg>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 w-10 text-xs font-medium text-left rtl:text-right bg-gray-50 text-gray-500">
                                <div class="flex items-center gap-x-3">
                                    <button class="flex items-center gap-x-2">
                                        <span class="uppercase tracking-wider leading-4 text-gray-500">Controller</span>

                                        <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                        </svg>
                                    </button>
                                </div>
                            </th>
                            <th class="px-6 py-3 text-left bg-gray-50 rtl:text-righ">
                                <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Member</span>
                            </th>
                            <th class="px-6 py-3 text-left bg-gray-50 rtl:text-righ">
                                <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Created at</span>
                            </th>
                            <th class="px-6 py-3 text-left bg-gray-50 w-60 rtl:text-righ">
                                <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Actions</span>
                            </th>
                        </tr>
                    </thead>
 
                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                        @foreach ($teams as $team)
                                    
                            <tr class="bg-white">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    <div class="inline-flex items-center gap-x-3">

                                        <x-checkbox wire:model="selectedTeams" wire:click="toggleTeamSelection('{{ $team->id }}')"  id="{{ $team->id }}" value="{{ $team->id }}" />
                                        <x-span>{{ $team->id }}</x-span>

                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                            <path fill="none" d="M0 0h256v256H0z" />
                                            <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" d="M156.3 203.7 128 232l-28.3-28.3M128 160v72M99.7 52.3 128 24l28.3 28.3M128 96V24M52.3 156.3 24 128l28.3-28.3M96 128H24M203.7 99.7 232 128l-28.3 28.3M160 128h72" />
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-nowrap">
                                    {{ $team->name }}
                                </td>  
                                <td class="px-6 py-4 text-sm text-gray-900  whitespace-nowrap">
                                    <div class="flex items-center gap-x-2">
                                        <img class="object-cover w-8 h-8 rounded-full" src="{{ asset('storage/' . $team->owner->profile_photo_path) }}" alt="team-owner">
                                        <div>
                                            <h2 class="text-sm leading-5 font-medium text-gray-900">{{ $team->user->name }}</h2>
                                            <p class="text-xs font-normal text-gray-600">{{ $team->user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center leading-5 text-gray-900 whitespace-nowrap">
                                    10
                                </td>
                                <td class="px-6 py-4 leading-5 text-gray-900 whitespace-nowrap">
                                    {{ $team->created_at }}
                                </td>
                                <td class="px-6 py-4 space-x-1 justify-around whitespace-nowrap">
                                    <x-button size="sm" variant="info" title="{{ __('View Data') }}">
                                        <x-heroicon-o-eye aria-hidden="true" class="w-5 h-5" sr-o/>
                                    </x-button>
                                    <x-button href="{{ route('teams.show', ['team' => $team->id]) }}" size="sm" variant="warning" title="{{ __('Edit Data') }}">
                                        <x-heroicon-o-pencil aria-hidden="true" class="w-5 h-5" />
                                    </x-button>
                                    <x-button size="sm" variant="danger" title="{{ __('Delete Data') }}">
                                        <x-heroicon-o-trash aria-hidden="true" class="w-5 h-5" />
                                    </x-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Table Pagination --}}
            <div class="mt-10">
                {{ $teams->links() }}
            </div>

        </section>
    </div>
</div>
