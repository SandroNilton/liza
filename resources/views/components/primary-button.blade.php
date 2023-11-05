<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-white bg-[#63AD6F] rounded text-[13px] leading-4 w-full sm:w-auto px-2.5 py-1.5 text-center font-medium']) }}>
  {{ $slot }}
</button>