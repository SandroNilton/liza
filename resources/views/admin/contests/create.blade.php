<x-admin-layout>
  <section class="z-20 w-full p-1 bg-white shadow-md">
    <div class="py-[5px] px-3 bg-white flex flex-wrap items-center justify-between">
      <div>
        <p class="text-[13px] leading-4 text-[#2477bc] py-1.5 font-medium">Concursos</p>
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
              <a href="#" class="text-[13px] leading-4 text-[#2477bc] py-1.5 font-medium">Nuevo</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </section>
  <div>
    @livewire('admin.contests.create')
  </div>
</x-admin-layout>

