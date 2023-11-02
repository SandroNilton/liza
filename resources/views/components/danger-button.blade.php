<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-white bg-[#ff4f37] focus:ring-0 focus:outline-none rounded-[2.5px] text-[13px] leading-4 w-full sm:w-auto px-2.5 py-1.5 text-center']) }}>
    {{ $slot }}
</button>