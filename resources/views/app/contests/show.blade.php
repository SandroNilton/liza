<x-app-layout>
  <section class="z-20 w-full p-1 bg-white shadow-md">
    <div class="py-[5px] px-3 bg-white flex flex-wrap items-center justify-between">
      <div>
        <p class="text-[13px] leading-4 text-[#2477bc] py-1.5 font-medium">Informacion</p>
      </div>
      <div class="flex items-center">
        <nav class="flex" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1">
            <li class="inline-flex items-center">
              <a href="#" class="text-[13px] leading-4 text-[#2477bc] py-1.5 font-medium">Concursos</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </section>
  <div class="grid gap-3 p-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
    <div class="order-2 col-span-1 p-3 mb-3 lg:col-span-2 lg:order-1">
      <div class="mb-3">
        <h1 class="font-medium text-[13px] text-[#2477bc] uppercase mb-3">Información</h1>
        @livewire('app.contests.show', ['contest' => $contest])
      </div>
    </div>
    <div class="order-1 col-span-1 p-3 lg:order-2">
      <div class="sticky top-28">
        <h1 class="font-medium text-[13px] text-[#2477bc] uppercase mb-3">Participación</h1>
        <div class="p-6 overflow-auto border rounded-[2.5px] shadow-sm">
          <p class="mb-3 text-sm leading-4 uppercase"><span class="font-medium text-[#2477bc] mr-2">Tiempo:</span> 12/10/2023 15:00 - 30/10/2023 00:00</p>
          @can('participating', $contest)
            <x-primary-button href="{{ route('contests.participate-state', $contest) }}" wire:navigate>Ver participación</x-primary-button>
          @else
            <x-primary-button href="{{ route('contests.participate', $contest) }}" wire:navigate>Participar</x-primary-button>
          @endcan
        </div>
      </div>
    </div>
  </div>
</x-app-layout>