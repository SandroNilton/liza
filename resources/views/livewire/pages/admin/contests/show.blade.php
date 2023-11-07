<div>
  <article class="mb-2">
    <div>
      <div class="space-y-4">
        <div class="relative flex justify-center p-1 border border-gray-300 border-dashed rounded">
          <figure>
            <img id="preview" src="{{ Storage::url($this->cover) }}" alt="" class="object-center w-full rounded">
          </figure>
        </div>
        <div>
          <x-input-label for="title" :value="__('Titulo')" />
          <x-text-input id="title" class="block w-full mt-1" type="text" name="title" value="{{ $this->title }}"/>
        </div>
        <div>
          <x-input-label for="subtitle" :value="__('Subtitulo')" />
          <x-text-input id="subtitle" class="block w-full mt-1" type="text" name="subtitle" value="{{ $this->subtitle }}"/>
        </div>
        <div>
          <x-input-label for="description" :value="__('Descripción')" />
          <x-textarea-input rows="7" id="description" name="description">{{ $this->description }}</x-textarea-input>
        </div>
      </div>
    </div>
  </article>
</div>