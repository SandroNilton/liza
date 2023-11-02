<div>
  <article class="mb-2">
    <div>
      <form wire:submit.prevent="update" class="space-y-3">
        <div>
          <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/newsletter/people-at-office.png" alt="Placeholder Image" class="object-cover object-center w-full h-64 rounded-[2.5px]">
        </div>
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
        <div class="flex justify-end space-x-3">
          <x-primary-button class="py-1.5">Editar</x-primary-button>
        </div>
      </form>
    </div>
  </article>
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