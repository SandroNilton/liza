<div>
  <h1 class="font-medium text-md leading-4 text-[#2477bc] uppercase mb-3">{{ $contest->title }}</h1>
  <p class="mb-3 text-sm font-medium leading-4 uppercase">{{ $contest->subtitle }}</p>
  <div class="p-2 mb-3 bg-gray-50 rounded-[2.5px]">
    <p class="text-[13px] leading-4">{{ $contest->description }}</p>
  </div>
  <figure class="aspect-auto">
    <img src="{{ $contest->image }}" alt="{{ $contest->title }}" class="object-cover object-center w-full h-96">
  </figure>
</div>