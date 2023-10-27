<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
                <h4 class="text-center">REGISTRATION</h4>
        <!-- Name -->
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" placeholder="Full Name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="hone" placeholder="Mobile Number" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- Roll Number -->
        <div class="mt-4">
            <x-input-label for="roll" :value="__('Roll')" />
            <x-text-input id="roll" placeholder="GST Roll" class="block mt-1 w-full" type="number" name="roll" :value="old('roll')" required />
            <x-input-error :messages="$errors->get('roll')" class="mt-2" />
        </div>
        <!-- Txn Id -->
        <div class="mt-4">
            <x-input-label for="txnid" :value="__('Transaction Id')" />
            <x-text-input id="txnid" placeholder="Transaction ID" class="block mt-1 w-full" type="text" name="txnid" :value="old('txnid')" required />
            <x-input-error :messages="$errors->get('txnid')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" placeholder="xxxxxx@xxx.com" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="*********" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" placeholder="*********" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('login') }}" style="text-decoration:none;">
                {{ __('Already registered?') }}
            </a>

            <button class="btn btn-success">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
