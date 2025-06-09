@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm uppercase text-gray-600']) }}>
    {{ $value ?? $slot }}
</label>
