<x-app-layout>
  <section class="z-20 w-full p-1 bg-white shadow-md">
    <div class="py-[5px] px-3 bg-white flex flex-wrap items-center justify-between">
      <div>
        <p class="text-[13px] leading-4 text-[#2477bc] py-1.5 font-medium">Participar</p>
      </div>
      <div class="flex items-center">
        <nav class="flex" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1">
            <li class="inline-flex items-center">
              <a href="#" class="text-[13px] leading-4 text-[#2477bc] py-1.5 font-medium">Concursos</a>
            </li>
            <li class="inline-flex items-center">
              <ion-icon name="chevron-forward-outline" class="w-4 h-4 mx-1 text-[#d8d089]"></ion-icon>
            </li>
            <li class="inline-flex items-center">
              <a href="#" class="text-[13px] leading-4 text-[#2477bc] py-1.5 font-medium">Participar</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </section>
  <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 p-3 gap-3 ">
    <div class="p-3 mb-3 col-span-2">
      <h1 class="font-medium text-[13px] uppercase mb-3"><span class="font-medium text-[#2477bc] mr-2">Participar:</span> {{ $contest->title }}</h1>
      <h1 class="font-medium text-[13px] uppercase mb-3"><span class="font-medium text-[#2477bc] mr-2">Tiempo:</span> 02/10/2023 15:00 - 06/10/2023</h1>
      @livewire('app.contests.show', ['contest' => $contest])
    </div>
    <div class="p-3 mb-3 col-span-1">
      <h1 class="font-medium text-[13px] uppercase mb-3"><span class="font-medium text-[#2477bc] mr-2">Requisitos:</span></h1>
      @livewire('app.contests.participate', ['contest' => $contest])
    </div>
  </div>
</x-app-layout>