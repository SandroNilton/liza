<div>
  @forelse ($contest->sections as $item)
    <article class="mb-2 bg-white" wire:key="{{ $item->id }}" x-data="{open: false}">
      <div class="border-gray-200 border rounded-[2.5px] py-1.5 px-2.5 shadow-sm">
        @if ($section->id == $item->id)
          <form wire:submit.prevent="update">
            <x-input-label for="section.name" :value="__('Nombre')" />
            <x-text-input wire:model="section.name" id="section.name" class="block w-full mt-1" type="text" name="section.name" autofocus/>
            <x-input-error :messages="$errors->get('section.name')" class="mt-2" />
          </form>
        @else
          <header class="flex justify-between item-center text-[13px] leading-4 py-0.5">
            <p class="cursor-pointer font-medium text-center" x-on:click="open = !open"><span class="text-[#2477bc] mr-2">Seccion:</span>{{ $item->name }}</p>
            <div wire:ignore>
              <ion-icon name="create-outline" class="mr-2 h-4 w-4 text-[#c1a13f] cursor-pointer" wire:click="edit({{ $item }})"></ion-icon>
              <ion-icon name="trash-outline" class="mr-2 h-4 w-4 text-[#ff4f37] cursor-pointer" wire:click="destroy({{ $item }})"></ion-icon>
            </div>
          </header>
          <div x-show="open">
            @livewire('admin.contests.item-lesson', ['section' => $item], key($item->id))
          </div>
        @endif
      </div>
    </article>
  @empty
    <div class="border border-gray-400 border-dashed rounded-[2.5px] py-1.5 text-center mb-3">
      <p class="text-[13px] leading-4 text-gray-500"> No hay secciones</p>
    </div>
  @endforelse

  <div x-data="{open: false}" class="mt-4">
    <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
      <ion-icon name="add-circle-outline" class="mr-2 h-4 w-4 text-[#2477bc]" wire:ignore></ion-icon>
      <p class="text-[13px] leading-4">
        Agregar nueva sección
      </p>
    </a>
    <article class="border shadow p-3 rounded-[2.5px]" x-show="open">
      <p class="mb-3 text-[13px] leading-4 text-[#2477bc] font-medium text-center">Agregar nueva sección</p>
      <div class="mb-3">
        <x-input-label for="name" :value="__('Nombre')" />
        <x-text-input wire:model="name"/>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div class="flex justify-end space-x-3">
        <x-primary-button type="button" class="py-1.5" wire:click="store">Agregar</x-primary-button>
        <x-danger-button class="py-1.5" x-on:click="open = false">Cancelar</x-danger-button>
      </div>
    </article>
  </div>
</div>
