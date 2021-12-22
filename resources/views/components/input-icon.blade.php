<label class="relative flex flex-col w-full">
  <span class="mb-2 text-gray-600 select-none">{{ $label }}</span>
  <input value="{{ old($name) }}"
    class="py-2 pl-12 pr-2 placeholder-gray-300 border-2 border-green-800 rounded-md focus:ring-2 peer" {{ $attributes
    }} />

  {{ $path }}

</label>
