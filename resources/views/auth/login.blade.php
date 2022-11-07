<x-guest-layout>
    <x-slot name="title">
        Sign In
    </x-slot>
    <x-slot name="description">
        Don't have an account? <a href="{{ route('register') }}">Click here to sign up</a>
    </x-slot>

    <form livewire="wire:submit.prevent='login'" method="POST" class="mt-sm-4">
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!-- Username -->
        <div class="mb-3 input-group-lg">
            <input id="username" class="form-control @error('username') is-invalid @enderror" type="text"
                name="username" :value="old('username')" required autofocus wire:model="username" />
        </div>

        <!-- New password -->
        <div class="mb-3 position-relative">
            <!-- Password -->
            <div class="input-group input-group-lg">
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password"
                    name="password" required autocomplete="current-password" wire:model="password" />
                <span class="input-group-text p-0">
                    <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                </span>
            </div>
        </div>

        <!-- Remember me -->
        <div class="mb-3 d-sm-flex justify-content-between">
            <label for="remember_me" class="flex items-center">
                <input type="checkbox" name="remember" class="form-check-input" id="remember_me">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me?') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
            @endif

        </div>

        <!-- Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-lg btn-primary">Login</button>
        </div>

        @csrf
    </form>
</x-guest-layout>
