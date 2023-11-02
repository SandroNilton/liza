<?php

use Livewire\Volt\Component;

new class extends Component
{
    public function logout(): void
    {
        auth()->guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/login', navigate: true);
    }
}; 

?>

@php
  $links =  [
    [
      'title' => 'Panel',
      'url' => route('admin.dashboard'),
      'active' => request()->routeIs('admin.dashboard'),
      'icon' => 'bar-chart-outline',
      'can' => 'admin.dashboard'
    ],
    [
      'title' => 'Concursos',
      'url' => route('admin.contests.index'),
      'active' => request()->routeIs('admin.contests.index'),
      'icon' => 'ticket-outline',
      'can' => 'admin.contests.index'
    ],
    [
      'title' => 'Usuarios',
      'url' => route('admin.users.index'),
      'active' => request()->routeIs('admin.users.index'),
      'icon' => 'people-outline',
      'can' => 'admin.users.index'
    ],
    [
      'title' => 'Requisitos',
      'url' => route('admin.requirements.index'),
      'active' => request()->routeIs('admin.requirements.index'),
      'icon' => 'attach-outline',
      'can' => 'admin.requirements.index'
    ],
    [
      'title' => 'Roles',
      'url' => route('admin.roles.index'),
      'active' => request()->routeIs('admin.roles.index'),
      'icon' => 'shield-outline',
      'can' => 'admin.roles.index'
    ],
  ];
@endphp

<header class="sticky top-0 z-40 flex-none w-full mx-auto" x-data="{ open: false }" >
  <nav class="py-[5px] bg-[#2477bc] px-3">
    <div class="flex flex-wrap items-center justify-between">
      <a href="{{ route('admin.dashboard') }}" wire:navigate>
        <x-cap-logo class="h-9"></x-cap-logo>
      </a>
      <div class="flex items-center gap-2 text-white">
        <button type="button" class="items-center p-1" aria-expanded="true">
          <ion-icon class="block w-4 h-4 align-middle" name="mail-outline"></ion-icon>
        </button>
        <div class="hidden sm:flex sm:items-center">
          <x-dropdown align="right" width="40">
            <x-slot name="trigger">
              <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center px-2 justify-center text-[13px] leading-4 cursor-pointer">
                <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
              </button>
            </x-slot>
            <x-slot name="content">
              <x-dropdown-link :href="route('admin.profile')" wire:navigate>
                {{ __('Perfil') }}
              </x-dropdown-link>
              <button wire:click="logout" class="w-full text-left">
                <x-dropdown-link>
                  {{ __('Cerrar sesión') }}
                </x-dropdown-link>
              </button>
            </x-slot>
          </x-dropdown>
        </div>
        <button type="button" @click="open = ! open"  id="toggleMobileMenuButton" data-collapse-toggle="toggleMobileMenu" class="items-center p-1 rounded-lg lg:hidden" aria-expanded="true">
          <ion-icon class="block w-4 h-4 align-middle" name="grid-outline"></ion-icon>
        </button>
      </div>
    </div>
  </nav>
  <nav id="toggleMobileMenu" :class="{'block': open, 'hidden': ! open}" class="lg:block">
    <div class="px-0 lg:p-1 lg:py-[5px] lg:px-3 bg-white lg:border-b-[3px] border-[#d8d089]">
      <ul class="flex flex-col w-full lg:flex-row lg:gap-5">
        <li class="block border-b border-gray-50 lg:hidden">
          <button type="button" href="{{ route('admin.profile') }}" wire:navigate class="flex items-center justify-between w-full px-3 py-3 lg:px-0 lg:py-0 text-[13px] leading-4 ">
            <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
            <p>{{ auth()->user()->email }}</p>
          </button>
        </li>
        @foreach ($links as $link)
          <li class="block border-b border-gray-50 lg:inline lg:border-b-0">
            <a href="{{ $link['url'] }}" wire:navigate class="lg:px-0 lg:py-1.5 py-3 px-3 block {{ $link['active'] ? 'text-[#c1a13f]' : 'text-[#697384]' }}">
              <span class="flex items-center content-center space-x-2">
                <ion-icon name="{{ $link['icon'] }}"></ion-icon>
                <span class="text-[13px] leading-4">{{ $link['title'] }}</span>
              </span>
            </a>
          </li>
        @endforeach
        <li class="block border-b border-gray-50 lg:hidden">
          <button type="button" wire:click="logout" class="flex items-center justify-between w-full px-3 py-3 lg:px-0 lg:py-0 text-[13px] leading-4 bg-red-600 text-white">
            <p>Cerrar sesión</p>
            <ion-icon name="log-out-outline" class="block w-4 h-4"></ion-icon>
          </button>
        </li>
      </ul>
    </div>
  </nav>
</header>

