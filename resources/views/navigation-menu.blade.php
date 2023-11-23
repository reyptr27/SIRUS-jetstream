<nav aria-label="secondary" x-data="{ open: false }" 
    class="sticky top-0 z-10 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-white dark:bg-dark-eval-1"
    :class="{
        '-translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }" >

    <div class="flex items-center gap-3">
        <x-button type="button" class="md:hidden" iconOnly variant="secondary" srText="Toggle dark mode"
            @click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDarkMode" aria-hidden="true" class="w-6 h-6" />
            <x-heroicon-o-sun x-show="isDarkMode" aria-hidden="true" class="w-6 h-6" />
        </x-button>
    </div>

    <div class="flex items-center gap-3">
        <x-button type="button" class="hidden md:inline-flex" iconOnly variant="secondary" srText="Toggle full screen"
            @click="toggleFullscreen">
            <x-heroicon-o-arrows-pointing-out x-show="!isFullscreen" aria-hidden="true" class="w-6 h-6" />
            <x-heroicon-o-arrows-pointing-in x-show="isFullscreen" aria-hidden="true" class="w-6 h-6" />
        </x-button>
          
        <x-button type="button" class="hidden md:inline-flex" iconOnly variant="secondary" srText="Toggle dark mode"
            @click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDarkMode" aria-hidden="true" class="w-6 h-6" />
            <x-heroicon-o-sun x-show="isDarkMode" aria-hidden="true" class="w-6 h-6" />
        </x-button>

        <x-dropdown align="right" dropdownClasses="hidden md:block">
            <x-slot name="trigger">
                <button srText="Change language" type="button" class="hidden md:inline-flex p-2 text-sm font-medium items-center rounded-md transition ease-in-out duration-150 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-dark-eval-2 hover:text-gray-700 dark:hover:text-gray-200 focus:ring focus:outline-none focus:ring-purple-500 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1">
                    <x-heroicon-o-language aria-hidden="true" class=" h-6 w-6" />
                </button>
            </x-slot>
            <x-slot name="content">
                <div class="w-60">
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

        <!-- Teams Dropdown -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::user()->currentTeam != null)
            <x-dropdown align="right" width="60">
                <x-slot name="trigger">
                    <button type="button" class="inline-flex items-center rounded-md p-2 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none focus:ring focus:ring-purple-500 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1 dark:text-gray-400 dark:hover:text-gray-200">
                        
                        {{ Auth::user()->currentTeam->name }}
                        <x-heroicon-o-chevron-up-down class="ml-2 -mr-0.5 h-5 w-5" aria-hidden="true" />

                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="w-60">
                        <!-- Team Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            {{ __('Team Settings') }}
                        </x-dropdown-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-dropdown-link href="{{ route('teams.create') }}">
                                {{ __('Create New Team') }}
                            </x-dropdown-link>
                        @endcan

                        <div class="border-t border-gray-100 dark:border-gray-700"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" />
                        @endforeach
                    </div>
                </x-slot>
            </x-dropdown>       
        @endif

        <!-- Settings Dropdown -->
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button class="flex text-sm border-2 border-transparent rounded-md transition focus:outline-none focus:ring focus:ring-purple-500 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1">
                        <img class="h-8 w-8 rounded-md object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                @else
                    <button
                        class="flex items-center p-2 rounded-md text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none focus:ring focus:ring-purple-500 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1 dark:text-gray-400 dark:hover:text-gray-200">
                        <div>{{ Auth::user()->name }}</div>
    
                        <div class="ml-1">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                @endif
            </x-slot>

            <x-slot name="content">
                 <!-- Account Management -->
                 <div class="block px-4 pt-2 pb-2 text-xs text-gray-400">
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()))
                        {{ __('Signed in as') }}
                        <x-span class="text-xs flex justify-between">
                        @if (Auth::user()->hasVerifiedEmail())
                            {{ Auth::user()->username }}
                            {{-- If email verified --}}
                            <div class="inline-flex items-center px-2 py-1 rounded-full -mt-1 gap-x-1 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                 <svg width="10" height="10" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <h2 class="text-xs font-normal">Verified</h2>
                            </div>
                        @else
                            {{ Auth::user()->username }}
                            {{-- If email not verified --}}
                            <div class="inline-flex items-center px-2 py-1 text-red-500 -mt-1 rounded-full gap-x-1 bg-red-100/60 dark:bg-gray-800">
                                <svg width="10" height="10" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <h2 class="text-xs font-normal">Unverified</h2>
                            </div>
                        @endif
                        </x-span>
                    @else
                    {{ __('Signed in as') }}
                    <x-span class="text-xs flex justify-start">
                       {{ Auth::user()->username }}
                    </x-span>
                    @endif
                </div>

                <div class="border-t border-gray-100 dark:border-gray-700"></div>

                <x-dropdown-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-dropdown-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-dropdown-link>
                @endif

                <div class="border-t border-gray-100 dark:border-gray-700"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>          
</nav>