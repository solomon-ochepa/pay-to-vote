<x-guest-layout>
    <x-slot name="title">
        <div class="text-center">
            <h1 class="mb-2">Sign up</h1>

            <span class="d-block">
                @php $url = route('login'); @endphp
                Already have an account? <a href='{{ $url }}'>Sign in here</a>
            </span>
        </div>
    </x-slot>

    <!-- Form START -->

    <form method="POST" action="{{ route('register') }}" class="mt-4">
        <h4 class="border-bottom text-start">Personal information</h4>
        <!-- First name -->
        <div class="mb-3 input-group-lg">
            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name"
                :value="old('first_name')" autofocus autocomplete="first_name" required>
        </div>

        <!-- Last name -->
        <div class="mb-3 input-group-lg">
            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name"
                :value="old('last_name')" required>
        </div>

        <h4 class="border-bottom text-start">Contact</h4>
        <!-- Address -->
        <div class="mb-3 input-group-lg">
            <input type="text" id="address" name="address" class="form-control" placeholder="Home address"
                :value="old('address')" autocomplete="address" required>
        </div>

        <!-- Email -->
        <div class="mb-3 input-group-lg">
            <input type="email" id="email" name="email" class="form-control"
                placeholder="Email address (optional)" :value="old('email')" required>
            <small class="form-text text-start d-block">We'll never share your details with anyone else.</small>
        </div>

        <!-- Phone -->
        <div class="mb-3 input-group-lg">
            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Telephone number"
                :value="old('phone')" required>
        </div>

        <h4 class="border-bottom text-start">Security</h4>
        <!-- New password -->
        <div class="mb-3 position-relative">
            <div class="input-group input-group-lg">
                <input class="form-control fakepassword" type="password" id="psw-input" placeholder="Password"
                    name="password" required autocomplete="new-password">
                <span class="input-group-text p-0">
                    <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                </span>
            </div>

            <!-- Pswmeter -->
            <div id="pswmeter" class="mt-2"></div>
            <div class="d-flex mt-1">
                <div id="pswmeter-message" class="rounded"></div>
                <!-- Password message notification -->
                <div class="ms-auto">
                    <i class="bi bi-info-circle ps-1" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top"
                        data-bs-content="Include at least one uppercase, one lowercase, one special character, one number and 8 characters long."
                        data-bs-original-title="" title=""></i>
                </div>
            </div>
        </div>

        <!-- Confirm password -->
        <div class="mb-3 input-group-lg">
            <input class="form-control" type="password" id="password_confirmation" placeholder="Confirm password"
                name="password_confirmation" required autocomplete="new-password">
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature() and 1 > 1)
            <div class="mt-3">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' =>
                                    '<a target="_blank" href="' .
                                    route('terms.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                    __('Terms of Service') .
                                    '</a>',
                                'privacy_policy' =>
                                    '<a target="_blank" href="' .
                                    route('policy.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                    __('Privacy Policy') .
                                    '</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
        @endif

        <!-- Keep me signed in -->
        <div class="mb-3 text-start">
            <input type="checkbox" class="form-check-input" id="keepsingnedCheck">
            <label class="form-check-label" for="keepsingnedCheck"> Keep me signed in</label>
        </div>

        <!-- Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
        </div>

        @csrf
    </form>
</x-guest-layout>
