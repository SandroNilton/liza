<x-admin-layout>
  <div class="px-5 py-1.5">
    <div class="justify-between flex items-center py-1.5">
      <div>
        <p class="text-lg text-[#2F303C] font-medium">Participantes</p>
      </div>
    </div>
    <div class="pt-1"><hr class="border-[#EAECF0]"></div>
    <div class="pt-5">
      <div class="grid gap-4 lg:grid-cols-3 grid-cols-2 sm:grid-cols-1">
        <div class="order-2 col-span-1 mb-3 lg:col-span-2 lg:order-1">
          @livewire('admin.participants.group', ['contest' => $contest])
        </div>
        <div class="order-1 col-span-1 lg:order-2">
          <div class="sticky top-5 bg-white shadow-sm p-3 rounded border border-[#EAECF0]">
            @livewire('admin.contests.show', ['contest' => $contest])
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>