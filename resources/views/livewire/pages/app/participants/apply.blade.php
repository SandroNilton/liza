<div>
  <div>
    <form wire:submit.prevent="store" enctype="multipart/form-data" class="space-y-2">
      @forelse ($contest->requirements as $key => $requirement)
        <div class="border border-[#F0F1F2] px-3 py-1.5 text-[13px] leading-4 rounded">
          <p><span class="text-[#2F303C] mr-2 font-medium">Requisito:</span>{{ $requirement->name }}</p>
          <div class="my-2">
            <div class="mt-2">
              <input type="text" wire:model="items.{{ $key }}.requirement_id">
              <input type="file" wire:model="items.{{ $key }}.file"/>
              <x-input-error :messages="$errors->get('items.'.$key.'.file')" class="mt-2" />
                <x-input-error :messages="$errors->get('items.'.$key.'.requirement_id')" class="mt-2" />
            </div>
          </div>
        </div>
      @empty
        <div class="border border-gray-400 border-dashed rounded-[2.5px] py-1.5 text-center mb-3 mt-3">
          <p class="text-[13px] leading-4 text-gray-500"> No hay requisitos</p>
        </div>
      @endforelse
      <x-input-error :messages="$errors->get('items')" class="mt-2" />

      <x-primary-button type="submit">Participar</x-primary-button>
    </form>
  </div>
</div>
