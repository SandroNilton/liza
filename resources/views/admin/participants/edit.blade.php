<x-admin-layout>
  <div class="px-5 py-1.5">
    <div class="justify-between flex items-center py-1.5">
      <div>
        <p class="text-lg text-[#2F303C] font-medium">Evaluar Participación</p>
      </div>
    </div>
    <div class="pt-1"><hr class="border-[#EAECF0]"></div>
    <div class="pt-5">
      <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-4 bg-white shadow-sm px-4 py-4">
        @livewire('admin.participants.edit', ['participant' => $participant])
        @livewire('admin.participants.edit', ['participant' => $participant])
        @livewire('admin.participants.edit', ['participant' => $participant])
      </div>
    </div>
  </div>
</x-admin-layout>