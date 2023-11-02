<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    #[Rule(['required', 'string', 'email'])]
    public string $email = '';

    #[Rule(['required', 'string'])]
    public string $password = '';

    #[Rule(['boolean'])]
    public bool $remember = false;

    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! auth()->attempt($this->only(['email', 'password'], $this->remember))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());

        session()->regenerate();

        if (auth()->user()->type == 'admin') {
          $this->redirect(route('admin.dashboard'), navigate: true);
        }else{
          $this->redirect(route('dashboard'), navigate: true);
        }
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
  <div class="lg:pb-16 lg:pt-16 lg:gap-20 lg:grid-cols-12 lg:grid pb-10 pt-10 pl-4 pr-4 max-w-screen-xl ml-auto mr-auto">
    <div class="mr-auto lg:mb-0 lg:flex justify-between flex-col hidden mr-auto col-span-6">
      <div>
        <a href="#" class="lg:mb-10 text-[rgb(17,24,39)] font-semibold text-2xl leading-8 items-center inline-flex mb-6">
          <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
          Flowbite    
        </a>
        <div class="flex">
          <svg class="w-5 h-5 mr-2 text-[rgb(37,99,235)] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
          <div>
            <h3 class="mb-2 text-xl leading-7 font-bold leading-none text-[rgb(17,24,39)]">Get started quickly</h3>
            <p class="mb-2 font-light text-[rgb(107,114,128)]">Integrate with developer-friendly APIs or choose low-code.</p>
          </div>
        </div>
        <div class="flex pt-8">
          <svg class="w-5 h-5 mr-2 text-[rgb(37,99,235)] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
          <div>
              <h3 class="mb-2 text-xl leading-7 font-bold leading-none text-[rgb(17,24,39)]">Support any business model</h3>
              <p class="mb-2 font-light text-[rgb(107,114,128)]">Host code that you don't want to share with the world in private.</p>
          </div>
        </div>
        <div class="flex pt-8">
          <svg class="w-5 h-5 mr-2 text-[rgb(37,99,235)] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
          <div>
              <h3 class="mb-2 text-xl leading-7 font-bold leading-none text-[rgb(17,24,39)]">Join millions of businesses</h3>
              <p class="mb-2 font-light text-[rgb(107,114,128)]">Flowbite is trusted by ambitious startups and enterprises of every size.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="lg:hidden text-center mb-6">
      <a href="#" class="lg:hidden text-[rgb(17,24,39)] font-semibold text-2xl leading-8 items-center inline-flex">
        <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
        Flowbite
      </a>
    </div>
    <div class="lg:p-0 lg:mt-0 sm:max-w-lg shadow bg-white rounded-[3.5px] w-full ml-auto mr-auto col-span-6">
      <div class="sm:p-8 p-8 lg:space-y-6 space-y-4">
        <h1 class="text-xl leading-7 font-bold leading-tight tracking-tight text-[rgb(17,24,39)] sm:text-2xl sm:leading-8">
          Ingresa a tu cuenta
        </h1>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form wire:submit="login" class="lg:space-y-6 space-y-4">
          <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
          <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
          <div class="block">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="remember" id="remember" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
          </div>
          <div class="flex items-center flex justify-between">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        </form>
      </div>
    </div>
  </div>
</div>
