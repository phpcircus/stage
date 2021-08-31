<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="pt-4">
            @csrf

            <div x-data="{ placeholder: 'johndoe@email.com' }" class="relative">
                <x-jet-input x-on:focus="setTimeout(() => placeholder = 'Email', 200)"
                    x-on:blur="setTimeout(() => placeholder = $el.value ? 'Email' : 'johndoe@email.com', 200)"
                    id="email" class="block w-full mt-1 placeholder-transparent peer" placeholder="johndoe@email.com" type="email" name="email" :value="old('email')" required />
                <x-jet-label for="email" x-text="placeholder" x-ref="emailLabel"
                    class="absolute text-sm text-gray-600 transition-all duration-[400ms] -top-6 peer-placeholder-shown:top-[.65rem] peer-placeholder-shown:left-2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:left-0 peer-focus:-top-6 peer-focus:text-gray-600 peer-focus:text-sm" />
            </div>

            <div x-data="{ placeholder: '************' }" class="relative mt-8">
                <x-jet-input x-on:focus="setTimeout(() => placeholder = 'Password', 200)"
                    x-on:blur="setTimeout(() => placeholder = $el.value ? 'Password' : '************', 200)"
                    id="password" class="block w-full mt-1 placeholder-transparent peer" placeholder="*****************" type="password" name="password" required autocomplete="current-password" />
                <x-jet-label for="password" x-text="placeholder" x-ref="passwordLabel"
                    class="absolute text-sm text-gray-600 transition-all duration-[400ms] -top-6 peer-placeholder-shown:top-[.65rem] peer-placeholder-shown:left-2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:left-0 peer-focus:-top-6 peer-focus:text-gray-600 peer-focus:text-sm" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button.primary type="submit"
                    class="group">
                    {{ __('Log in') }}
                    <x-heroicon-o-chevron-right class="h-4 ml-2 text-gray-800 group-hover:text-white group-hover:hidden"></x-heroicon-chevron-right>
                    <x-heroicon-o-arrow-right class="hidden h-4 ml-2 text-gray-800 group-hover:text-white group-hover:inline-block"></x-heroicon-chevron-right>
                </x-button.primary>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
