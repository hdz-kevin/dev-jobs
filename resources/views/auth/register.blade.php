<x-guest-layout>
  <form method="POST" action="{{ route('register') }}" novalidate>
    @csrf

    <!-- Name -->
    <div>
      <x-input-label for="name" :value="__('Name')" />
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
        autofocus autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
        autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- User Role -->
    <div class="mt-4">
      <x-input-label for="role" :value="__('Choose your role in DevJobs')" />
      
      <select
        name="role"
        id="role"
        class="border-gray-300 focus:border-indigo-400 focus:ring-indigo-400 rounded-md shadow-sm w-full"
      >
        <option value="" disabled selected>Select Role</option>
        <option value="developer">Developer - Get a Job</option>
        <option value="recruiter">Recruiter - Posts Jobs</option>
      </select>

      <x-input-error :messages="$errors->get('role')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />

      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
        required autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-between mt-4">
      <x-form-link :href="route('login')">
        Already registered?
      </x-form-link>
      <x-form-link :href="route('password.request')">
        Forgot your password?
      </x-form-link>
    </div>
    <x-primary-button class="w-full justify-center mt-4">
      Create Account
    </x-primary-button>
  </form>
</x-guest-layout>
