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
                    <x-heroicon-o-eye aria-hidden="true" class="w-6 h-6" />
                </button>

                <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="showPassword = !showPassword" :class="{'block': !showPassword, 'hidden': showPassword }">
                    <x-heroicon-o-eye-slash aria-hidden="true" class="w-6 h-6" />
                </button>
            </x-input-with-icon-wrapper>
        </div>
        
        <div class="mt-5 sm:mt-0 sm:flex sm:ml-2 sm:items-end sm:place-content-end"> 
            <x-button class="justify-center w-full gap-2 pt-2.5" variant="primary" wire:click="generatePassword" type="button">
                <x-heroicon-o-key aria-hidden="true" class="w-6 h-6" />
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
                <x-heroicon-o-eye aria-hidden="true" class="w-6 h-6" />
            </button>

            <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="showConfirmPassword = !showConfirmPassword" :class="{'block': !showConfirmPassword, 'hidden': showConfirmPassword }">
                <x-heroicon-o-eye-slash aria-hidden="true" class="w-6 h-6" />
            </button>
        </x-input-with-icon-wrapper>
    </div>

</div>
