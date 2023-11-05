<?php

use function Livewire\Volt\{state};
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
      'title' => 'Inicio',
      'url' => route('admin.dashboard'),
      'active' => request()->routeIs('admin.dashboard'),
      'icon' => 'shapes-outline',
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

<div class="bg-[#1F2433] w-60 overflow-y-auto scrollbar flex max-h-screen fixed inset-y-0 z-10 flex-col flex-shrink-0 overflow-hidden transition-all transform shadow-lg lg:z-auto lg:static lg:shadow-none" :class="{ '-translate-x-full lg:translate-x-0 lg:w-12': !sidebarOpen }">
  <div class="flex items-center justify-between flex-shrink-0 px-5 pt-5" :class="{'lg:justify-center': !sidebarOpen}">
    <a href="{{ route('admin.dashboard') }}" wire:navigate class="flex items-center justify-center p-1 rounded focus:outline-none focus:ring-1 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900" :class="{'lg:hidden': !sidebarOpen}">
      <x-cap-logo class="h-9"></x-cap-logo>
    </a>
    <button class="flex items-center justify-center p-1 bg-gray-800 rounded focus:outline-none" @click="sidebarOpen = !sidebarOpen">
      <ion-icon name="menu-outline" class="w-5 h-5 text-white stroke-current"></ion-icon>
    </button>
  </div>
  <div class="px-5 pt-4" :class="{'lg:hidden': !sidebarOpen}">
    <div class="relative">
      <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
        <ion-icon name="search-outline" class="w-4 h-4 text-gray-500 stroke-current"></ion-icon>
      </div>
      <input type="text" class="w-full rounded pl-8 pr-4 py-1.5 text-[13px] leading-4 font-light bg-gray-800 text-gray-400 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500 focus:bg-gray-800 border-gray-500" placeholder="search">
    </div>
  </div>

  <div class="px-5 pt-4"><hr class="border-gray-700"></div>

  <div class="flex-1 pt-2 space-y-2 overflow-hidden hover:overflow-y-auto p-5">
    @foreach ($links as $link)
      <a href="{{ $link['url'] }}" wire:navigate class="flex items-center justify-between flex-shrink-0 py-1.5 font-medium {{ $link['active'] ? 'text-[#63AD6F]' : 'text-white ' }}" " :class="{'lg:justify-center': !sidebarOpen}" >
        <button class="flex items-center justify-center focus:outline-none">
          <ion-icon name="{{ $link['icon'] }}" class="w-5 h-5 stroke-current"></ion-icon>
        </button>
        <div class="flex items-center text-[13px] leading-4 pl-8 pr-4 " :class="{'lg:hidden': !sidebarOpen}">
          {{ $link['title'] }}
        </div>
      </a>
    @endforeach
  </div>
  <div class="px-5 py-3 bg-[#232529] flex items-center justify-between flex-shrink-0" :class="{'lg:justify-center': !sidebarOpen}">
    <div class="flex items-center" :class="{'lg:hidden': !sidebarOpen}">
      <div class="relative w-8 h-8 rounded-full before:absolute before:w-2 before:h-2 before:bg-green-500 before:rounded-full before:right-0 before:bottom-0 before:ring-1 before:ring-white">
        <img class="rounded-full" src="https://limacap.org/wp-content/uploads/2023/03/favicon.jpeg" alt="">
      </div>
      <div class="flex flex-col pl-3">
        <div class="text-sm text-gray-50"><a href="{{ route('admin.profile') }}" wire:navigate>{{ Auth::user()->name }}</a></div>
        <span class="text-xs text-[#acacb0] font-light tracking-tight">{{ Auth::user()->email }}</span>
      </div>
    </div>
    <button type="button" wire:click="logout" class="flex items-center justify-center p-1 bg-red-700 rounded focus:outline-none">
      <ion-icon name="log-out-outline" class="w-5 h-5 text-white stroke-current"></ion-icon>
    </button>
  </div>
</div>

