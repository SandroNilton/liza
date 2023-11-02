<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-[#c1a13f] bg-white border-2 border-[#c1a13f] focus:ring-2 focus:outline-none focus:ring-[#d8d089] rounded-[3px] text-[13px] leading-4 w-full sm:w-auto px-2.5 py-1 text-center']) }}>
  {{ $slot }}
</button>