@props(['type'])
<button {{ $attributes->merge(['class'=>'block flex items-center justify-center w-full h-12 font-semibold text-center
  text-white duration-200 bg-green-800 border-2
  rounded-lg cursor-pointer hover:bg-green-900 hover:text-white hover:border-green-900']) }} type="{{ $type }}"
  >
  {{ $slot }}
</button>
