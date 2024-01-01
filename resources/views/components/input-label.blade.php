@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-900 dark:text-white',
    'style' => 'margin-bottom: 8px']) }}>
    {{ $value ?? $slot }}
</label>
