@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-[#F1F4F9] border border-[#EEEFF2] text-[#4C4F54] text-[13px] leading-4 rounded focus:ring-0 focus:border-[#E9EBEF] focus:bg-[#F6F8FA] block w-full py-1.5 px-2']) !!}>
 {{ $slot }}
</textarea>