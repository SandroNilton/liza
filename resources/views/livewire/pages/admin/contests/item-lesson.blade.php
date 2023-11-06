<div>
  @forelse ($section->lessons as $item)
    <article class="py-1" wire:key="{{ $item->id }}">
      <div>
        @if ($lesson->id == $item->id)
          <form wire:submit.prevent="update">
            <div class="flex items-center space-y-1">
              <div>
                <x-input-label for="lesson.name" :value="__('Nombre')" />
                <x-text-input wire:model="lesson.name" id="lesson.name" class="block w-full mt-1" type="text" name="lesson.name"/>
                <x-input-error :messages="$errors->get('lesson.name')" class="mt-2" />
              </div>
              <div>
                <x-input-label for="lesson.min" :value="__('Min')" />
                <x-text-input wire:model="lesson.min" id="lesson.min" class="block w-full mt-1" type="text" name="lesson.min"/>
                <x-input-error :messages="$errors->get('lesson.min')" class="mt-2" />
              </div>
              <div>
                <x-input-label for="lesson.max" :value="__('Max')" />
                <x-text-input wire:model="lesson.max" id="lesson.max" class="block w-full mt-1" type="text" name="lesson.max"/>
                <x-input-error :messages="$errors->get('lesson.name')" class="mt-2" />
              </div>
              <div class="flex justify-end space-x-3">
                <x-secondary-button type="submit" class="py-1.5">Actualizar</x-secondary-button>
                <x-danger-button type="button" class="py-1.5" wire:click="cancel">Cancelar</x-danger-button>
              </div>
            </div>
          </form>
        @else
          <div class="border px-3 py-1.5 text-[13px] leading-4">
            <p><span class="text-[#2477bc] mr-2 font-medium">Requisito:</span>{{ $item->name }}</p>
            <p><span class="text-[#2477bc] mr-2 font-medium">Valor min:</span>{{ $item->min }}</p>
            <p><span class="text-[#2477bc] mr-2 font-medium">Valor max:</span>{{ $item->max }}</p>
            <div class="my-2">
              <div class="mt-2">
                <x-secondary-button wire:click="edit({{ $item }})">Editar</x-secondary-button>
                <x-danger-button wire:click="destroy({{ $item }})">Eliminar</x-danger-button>
              </div>
            </div>
          </div>
        @endif
      </div>
    </article>
  @empty
    <div class="border border-[#F0F1F2] border-dashed rounded py-1.5 text-center mb-3 mt-3">
      <p class="text-[13px] leading-4 text-[#2F303C]"> No hay clases</p>
    </div>
  @endforelse

  <div x-data="{open: false}" class="mt-4 mb-4">
    <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
      <ion-icon name="add-circle-outline" class="mr-2 h-4 w-4 text-[#2F303C]" wire:ignore></ion-icon>
      <p class="text-[13px] leading-4">
        Agregar nueva lección
      </p>
    </a>
    <article class="border border-[#F0F1F2] shadow-sm p-3 rounded" x-show="open">
      <p class="mb-3 text-[13px] leading-4 text-[#2F303C] font-medium text-center">Agregar nueva lección</p>
      <div class="mb-3 space-y-1">
        <div>
          <x-input-label for="name" :value="__('Nombre')" />
          <x-text-input wire:model="name" id="name" class="block w-full mt-1" type="text" name="name"/>
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
          <x-input-label for="min" :value="__('Min')" />
          <x-text-input wire:model="min" id="min" class="block w-full mt-1" type="text" name="min"/>
          <x-input-error :messages="$errors->get('min')" class="mt-2" />
        </div>
        <div>
          <x-input-label for="max" :value="__('Max')" />
          <x-text-input wire:model="max" id="max" class="block w-full mt-1" type="text" name="name"/>
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
      </div>
      <div class="flex justify-end space-x-4">
        <x-secondary-button class="py-1.5" x-on:click="open = false">Cancelar</x-secondary-button>
        <x-primary-button type="button" class="py-1.5" wire:click="store">Agregar</x-primary-button>
      </div>
    </article>
  </div>

</div>
