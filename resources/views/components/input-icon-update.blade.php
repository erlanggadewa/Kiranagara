<label class="relative flex flex-col w-full">
  <span class="mb-2 text-gray-600 select-none">{{ $label }}</span>
  <input value="{{ $value }}"
    class="w-full px-3 py-2 pl-12 text-sm transition-all duration-150 ease-linear bg-white border-2 border-transparent rounded shadow focus:outline-none focus:ring focus:ring-primary"
    {{ $attributes }} />

  {{ $path }}

</label>
