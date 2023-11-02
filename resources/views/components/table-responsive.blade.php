<div class="p-3">
  <div class="flex flex-col mb-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0">
    {{ $heading }}
  </div>
  <div class="overflow-x-auto rounded-[2.5px] mb-3">
    {{ $slot }}
  </div>
  <div class="md:items-center">
    {{ $footer }}
  </div>
</div>