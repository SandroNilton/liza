<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-[#4C4F54] bg-[#F5F6F8] rounded text-[13px] leading-4 w-full sm:w-auto px-2.5 py-1.5 text-center font-medium']) }}>
  {{ $slot }}
</button>