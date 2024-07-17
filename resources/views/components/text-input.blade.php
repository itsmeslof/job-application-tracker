@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-zinc-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm']) !!}>
