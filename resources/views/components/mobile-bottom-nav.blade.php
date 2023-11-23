<div class="fixed z-10 inset-x-0 bottom-0 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-white md:hidden dark:bg-dark-eval-1"
    :class="{
        'translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">
    {{-- <x-button type="button" iconOnly variant="secondary" srText="Search">
        <x-heroicon-o-magnifying-glass aria-hidden="true" class="w-6 h-6" />
    </x-button> --}}

    <x-dropdown align="top" width="60" dropdownClasses="bottom-0 mb-12">
            <x-slot name="trigger">
                <button srText="Change language" type="button" class="md:hidden inline-flex p-2 text-sm font-medium items-center rounded-md transition ease-in-out duration-150 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-eval-2 hover:text-gray-700 dark:hover:text-gray-200 focus:ring focus:outline-none focus:ring-purple-500 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1">
                    <x-heroicon-o-language aria-hidden="true" class=" h-6 w-6" />
                </button>
            </x-slot>
            <x-slot name="content">
                <div class="w-50 bottom-0">
                    <!-- Change Language -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Change Language') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-switchable-team :team="$team" />
                    @endforeach
                </div>
            </x-slot>
    </x-dropdown>

    <a href="{{ route('dashboard') }}">
        <x-application-logo aria-hidden="true" class="w-10 h-10" />
        <span class="sr-only">SIRUS</span>
    </a>

    <x-button type="button" iconOnly variant="secondary" srText="Open main menu"
        @click="isSidebarOpen = !isSidebarOpen">
        <x-heroicon-o-bars-4 x-show="!isSidebarOpen" aria-hidden="true" class="w-6 h-6" />
        <x-heroicon-o-x-mark x-show="isSidebarOpen" aria-hidden="true" class="w-6 h-6" />
    </x-button>
</div>