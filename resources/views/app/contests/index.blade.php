<x-app-layout>
  <div class="px-5 py-1.5">
    <div class="justify-between flex items-center py-1.5">
      <div>
        <p class="text-lg text-[#2F303C] font-medium">Concursos</p>
      </div>
    </div>
    <div class="pt-1"><hr class="border-[#EAECF0]"></div>
    @livewire('app.contests.table')
  </div>
</x-app-layout>