<label class="relative flex flex-col w-full">
  <span class="mb-2 font-semibold text-gray-600 select-none">{{ $label }}</span>
  <input value="{{ old($name) }}"
    class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring focus:ring-primary"
    {{ $attributes }} />
</label>
