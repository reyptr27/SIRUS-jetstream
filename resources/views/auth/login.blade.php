<x-guest-layout>

    @section('title', __('Login'))

    <x-authentication-card>
        <!-- Session Status -->
        <x-authentication-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-authentication-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

           <div class="grid gap-6">
                <!-- Identity (nik, username or email) -->
                <div class="space-y-2">
                    <x-label for="identity" :value="__('NIK / Username / Email')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-identification aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="identity" class="form-input block w-full" type="text" name="identity"
                            :value="old('identity')" placeholder="{{ __('Identity') }}" required autofocus autocomplete="username || email" />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Password -->
                {{-- Default --}}
                {{-- <div class="space-y-2">
                    <x-label for="password" :value="__('Password')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="password" class="form-input block w-full" type="password" name="password" required
                            autocomplete="off" placeholder="{{ __('Password') }}" />
                    </x-input-with-icon-wrapper>
                </div> --}}

                {{-- Custom password form with hide/unhide feature --}}   
                <div class="space-y-2" x-data="{ showPassword : true }">
                    <x-label for="password" :value="__('Password')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <input id="password" class="form-input block w-full pl-11 pr-10 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                            focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                            dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" type="password" name="password" required
                            :type="showPassword ? 'password' : 'text'" autocomplete="off" placeholder="{{ __('Password') }}" />
                        
                        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="showPassword = !showPassword" :class="{'hidden': !showPassword, 'block': showPassword }">
                            <x-heroicon-o-eye aria-hidden="true" class="w-6 h-6" />
                        </button>
                        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="showPassword = !showPassword" :class="{'block': !showPassword, 'hidden': showPassword }">
                            <x-heroicon-o-eye-off aria-hidden="true" class="w-6 h-6" />
                        </button>
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="form-checkbox text-purple-500 border-gray-300 rounded focus:border-purple-300 focus:ring focus:ring-purple-500 dark:border-gray-600 dark:bg-dark-eval-1 dark:focus:ring-offset-dark-eval-1"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>
            
                <div>
                    <x-button class="justify-center w-full gap-2">
                        <x-heroicon-o-login class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('Log in') }}</span>
                    </x-button>
                </div>

                @if (Route::has('register'))
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Don’t have an account?') }}
                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">
                            {{ __('Register') }}
                        </a>
                    </p>
                @endif
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
