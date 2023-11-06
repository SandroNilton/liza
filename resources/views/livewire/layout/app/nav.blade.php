<?php

use function Livewire\Volt\{state};

//

?>

<div class="flex-shrink-0 bg-gray-800 text-gray-100 px-3 py-1.5 md:hidden">
  <div class="flex justify-between p-1">
    <span></span>
    <button class="flex items-center justify-center p-1 bg-gray-800 rounded focus:outline-none" @click="sidebarOpen = !sidebarOpen">
      <ion-icon name="menu-outline" class="w-5 h-5 text-white stroke-current"></ion-icon>
    </button>
  </div>
</div>