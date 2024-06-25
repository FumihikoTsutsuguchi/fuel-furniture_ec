@props(['value'])

<label {{ $attributes->merge(['class' => 'font-medium text-base text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
