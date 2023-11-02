<div>
  @forelse ($contest->folders as $folder)
    <article class="mb-2 bg-white" wire:key="{{ $folder->id }}" x-data="{open: true}">
      <div class="border-gray-200 border rounded-[2.5px] py-1.5 px-2.5 shadow-sm">
        <header class="flex justify-between item-center text-[13px] leading-4 py-0.5 mb-2">
          <p class="font-medium cursor-pointer" x-on:click="open = !open"><span class="text-[#2477bc] mr-2">Seccion:</span>{{ $folder->name }}</p>
        </header>
        <div x-show="open" class="space-y-1.5">
          <form wire:submit.prevent="uploads" enctype="multipart/form-data">
            @forelse ($folder->requirements as $requirement)
              <div class="border px-3 py-1.5 text-[13px] leading-4" wire:key="{{ $requirement->id }}">
                <p><span class="text-[#2477bc] mr-2 font-medium">Requisito:</span>{{ $requirement->name }}</p>
                <div class="my-2">
                  <div class="mt-2">
                    <input type="file" wire:model="files" name="" id="">
                    @error('files.*') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
            @empty
              <div class="border border-gray-400 border-dashed rounded-[2.5px] py-1.5 text-center mb-3 mt-3">
                <p class="text-[13px] leading-4 text-gray-500"> No hay requisitos</p>
              </div>
            @endforelse
            <x-primary-button type="submit">Show</x-primary-button>
          </form>
        </div>
      </div>
    </article>
  @empty
    <div class="border border-gray-400 border-dashed rounded-[2.5px] py-1.5 text-center mb-3">
      <p class="text-[13px] leading-4 text-gray-500"> No hay folders</p>
    </div>
  @endforelse
</div>
