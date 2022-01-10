@props(['type'])
<button
  {{ $attributes->merge([
      'class' => 'block flex items-center justify-center w-full h-12 font-semibold text-center text-white duration-200  border-2 rounded-lg cursor-pointer  hover:text-white',
  ]) }}
  type="{{ $type }}">
  {{ $slot }}
</button>
