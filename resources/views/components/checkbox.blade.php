@props(['name'])
<label {{ $attributes->merge(['class' => 'inline-flex items-center']) }}>
  <input name="{{ $name }}" type="checkbox" class="w-5 h-5 rounded-md text-primary form-checkbox"><span
    class="ml-2 text-primary">{{ $slot
    }}</span>
</label>
