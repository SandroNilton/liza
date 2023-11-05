<div>
  <article class="mb-2">
    <div>
      <form wire:submit.prevent="update" class="space-y-2" enctype="multipart/form-data">
        <div class="relative flex justify-center p-1 mt-1 border border-gray-300 border-dashed rounded" x-data="previewImage()">
          <figure>
            <img id="preview" x-show="imageUrl" :src="imageUrl" alt="" class="object-center w-full rounded">
            <img x-show="!imageUrl" src="https://drkamalpashafoundation.com/wp-content/uploads/2022/07/noimage.jpg" alt="" class="aspect-[11/5] object-cover object-center w-full rounded">
          </figure>
          <div class="absolute top-3 right-3">
            <label class="bg-white px-2 py-1.5 rounded text-[13px] leading-4 font-medium items-center flex cursor-pointer">
              <ion-icon name="camera-outline" class="w-4 h-4 mr-2" wire:ignore></ion-icon>
              Cambiar imagen
              <input wire:model="cover" type="file" accept="image/*" class="hidden" @change="fileChosen">
            </label>
          </div>
          <div class="absolute top-3 left-3" wire:loading wire:target="cover">
            <label class="bg-white px-2 py-1.5 rounded text-[13px] leading-4 font-medium items-center flex cursor-pointer">
              <ion-icon name="sync-outline" class="w-4 h-4 mr-2 animate-spin" wire:ignore></ion-icon>
              Cargando imagen espere
            </label>
          </div>
        </div>
        <div>
          <x-input-label for="title" :value="__('Titulo')" />
          <x-text-input wire:model="title" id="title" class="block w-full mt-1" type="text" name="title"/>
          <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
          <x-input-label for="subtitle" :value="__('Subtitulo')" />
          <x-text-input wire:model="subtitle" id="subtitle" class="block w-full mt-1" type="text" name="subtitle"/>
          <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
        </div>
        <div>
          <x-input-label for="email" :value="__('Descripción del concurso')" />
          <x-textarea-input rows="7" wire:model="description" id="description" name="description"/>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="flex justify-end mt-5 space-x-4">
          <x-secondary-button type="button" href="{{ route('admin.contests.index') }}" wire:navigate>Cancelar</x-secondary-button>
          <x-primary-button>Modificar</x-primary-button>
        </div>
      </form>
    </div>
  </article>
</div>

<script>
  function previewImage() {
    return {
      imageUrl: '{{ Storage::url($this->cover) }}',
      fileChosen(event) {
          this.fileToDataUrl(event, (src) => (this.imageUrl = src));
      },
      fileToDataUrl(event, callback) {
          if (!event.target.files.length) return;
          let file = event.target.files[0],
              reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = (e) => callback(e.target.result);
      },
    };
  }
</script>