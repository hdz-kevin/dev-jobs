@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-400 focus:ring-indigo-400 rounded-md shadow-sm']) }}>
