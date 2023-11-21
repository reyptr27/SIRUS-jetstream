<x-guest-layout>

    @section('title', __('Register'))

    <x-authentication-card>

        <!-- Validation Errors -->
        <x-authentication-validation-errors class="mb-4" :errors="$errors" />

       <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid gap-6">
                <!-- NIK -->
                <div class="space-y-2">
                    <x-label for="nik" :value="__('NIK')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-identification aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="nik" class="form-input block w-full" type="text" name="nik" :value="old('nik')"
                            required autofocus placeholder="{{ __('NIK') }}" autocomplete="off" />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Name -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Name')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="name" class="form-input block w-full" type="text" name="name" :value="old('name')"
                            required autofocus placeholder="{{ __('Name') }}" autocomplete="name" />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Username -->
                <div class="space-y-2">
                    <x-label for="username" :value="__('Username')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user-circle aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="username" class="form-input block w-full" type="text" name="username" :value="old('username')"
                            required autofocus placeholder="{{ __('Username') }}" autocomplete="username" />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-label for="email" :value="__('Email')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="email" class="form-input block w-full" type="email" name="email"
                            :value="old('email')" required placeholder="{{ __('Email') }}" autocomplete="email" />
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
                        <input id="password" class="form-input block w-full pl-11 pr-4 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                            focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                            dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" type="password" name="password" required
                            :type="showPassword ? 'password' : 'text'" autocomplete="off" placeholder="{{ __('Password') }}" />
                        
                        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="showPassword = !showPassword" :class="{'hidden': !showPassword, 'block': showPassword }">
                            <!-- Heroicon name: eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="showPassword = !showPassword" :class="{'block': !showPassword, 'hidden': showPassword }">
                            <!-- Heroicon name: eye-slash -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Confirm Password -->
                {{-- Default --}}
                {{-- <div class="space-y-2">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="password_confirmation" class="form-input block w-full" type="password"
                            name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" />
                    </x-input-with-icon-wrapper>
                </div> --}}

                {{-- Custom confirm password form with hide/unhide feature --}}   
                <div class="space-y-2" x-data="{ showConfirmPassword : true }">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <input id="password_confirmation" class="form-input block w-full pl-11 pr-4 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                            focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                            dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" type="password" name="password_confirmation" 
                            :type="showConfirmPassword ? 'password' : 'text'" autocomplete="off" required placeholder="{{ __('Confirm Password') }}" />

                        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="showConfirmPassword = !showConfirmPassword" :class="{'hidden': !showConfirmPassword, 'block': showConfirmPassword }">
                            <!-- Heroicon name: eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="showConfirmPassword = !showConfirmPassword" :class="{'block': !showConfirmPassword, 'hidden': showConfirmPassword }">
                            <!-- Heroicon name: eye-slash -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </x-input-with-icon-wrapper>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="space-y-2">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-blue-600 hover:text-blue-900 dark:hover:text-blue-400">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-blue-600 hover:text-blue-900 dark:hover:text-blue-400">'.__('Privacy Policy').'</a>',
                                     ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div>
                    <x-button class="justify-center w-full gap-2">
                        <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('Register') }}</span>
                    </x-button>
                </div>

                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Already registered?') }}
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                        {{ __('Login') }}
                    </a>
                </p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
