<x-admin-layout>
  <div class="px-5 py-1.5">
    <div class="justify-between flex items-center py-1.5">
      <div>
        <p class="text-lg text-[#2F303C] font-medium">Concursos</p>
      </div>
      <div>
        <x-primary-button href="{{ route('admin.contests.create') }}" wire:navigate>Agregar Concurso</x-primary-button>
      </div>
    </div>
    <div class="pt-1"><hr class="border-[#EAECF0]"></div>
    @livewire('admin.contests.table')
  </div>
</x-admin-layout>