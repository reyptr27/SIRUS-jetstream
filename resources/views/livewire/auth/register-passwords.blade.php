<div class="grid gap-6">
    <div class="grid sm:flex">
        {{-- Custom password form with hide/unhide feature --}}   
        <div class="space-y-2" x-data="{ showPassword: true }">
            <x-label for="password" :value="__('Password')" />

            <x-input-with-icon-wrapper>
                <x-slot name="icon">
                    <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                </x-slot>
                <input id="password" class="form-input block w-full pl-11 pr-10 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                    focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                    dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" type="password" wire:model="password" name="password" required
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
        
        <div class="mt-5 sm:mt-0 sm:flex sm:ml-2 sm:items-end sm:place-content-end"> 
            <x-button class="justify-center w-full gap-2 pt-2.5" variant="primary" wire:click="generatePassword" type="button">
                <x-heroicon-o-key class="w-6 h-6" aria-hidden="true" />
                <span>{{ __('Generate') }}</span>
            </x-button>
        </div> 

    </div>

    {{-- Custom confirm password form with hide/unhide feature --}}   
    <div class="space-y-2" x-data="{ showConfirmPassword : true }">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />
       
        <x-input-with-icon-wrapper>
            <x-slot name="icon">
                <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
            </x-slot>
            <input id="password_confirmation" class="form-input block w-full pl-11 pr-10 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" type="password" wire:model="passwordConfirmation" name="password_confirmation" 
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

</div>
