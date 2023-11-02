<div>
  <form wire:submit="createContest">
    <div class="grid grid-cols-1 gap-3 p-6 lg:grid-cols-3 md:grid-cols-4 sm:grid-cols-1">
      <div>
        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/newsletter/people-at-office.png" alt="Placeholder Image" class="object-cover object-center w-full h-64 rounded-[2px]">
      </div>
      <div class="space-y-2">
        <div>
          <x-input-label for="title" :value="__('Titulo')" />
          <x-text-input wire:model="title" id="title" class="block w-full mt-1" type="text" name="title" autofocus/>
          <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
          <x-input-label for="slug" :value="__('Slug de concurso')" />
          <x-text-input wire:model="slug" id="slug" class="block w-full mt-1" type="text" name="slug" readonly="true"/>
          <x-input-error :messages="$errors->get('slug')" class="mt-2" />
        </div>
        <div>
          <x-input-label for="subtitle" :value="__('Subtitulo')" />
          <x-text-input wire:model="subtitle" id="subtitle" class="block w-full mt-1" type="text" name="subtitle"/>
          <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
        </div>
      </div>
      <div class="space-y-2">
        <x-input-label for="email" :value="__('Descripción')" />
        <x-textarea-input wire:model="description" id="description" name="description"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
    </div>

  <section class="fixed bottom-0 z-20 w-full p-1 bg-[#d8d089]">
    <div class="py-[5px] px-3 flex flex-wrap items-center justify-between">
      <div>
        <x-primary-button>
          <ion-icon name="trash-outline" class="w-4 h-4"></ion-icon>
        </x-primary-button>
      </div>
      <div class="flex items-center gap-2">
        <x-primary-button class="uppercase">
          Guardar
        </x-primary-button>
      </div>
    </div>
   
  </section>
</form>
  
</div>

<script>
  document.addEventListener('livewire:navigated', () => {

    document.getElementById("title").addEventListener("keyup", slugChange);

    function slugChange() {
      title = document.getElementById("title").value;
      document.getElementById("slug").value = slug(title);
      @this.set('slug', slug(title));
    }

    function slug(str) {
      var $slug = '';
      var trimmed = str.trim(str);
      $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
      return $slug.toLowerCase();
    }
    console.log("navigated");
    
  });
</script>