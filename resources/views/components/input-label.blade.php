@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-1 text-[13px] leading-4 font-medium text-[#697384] dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
