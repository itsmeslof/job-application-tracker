@props(['value' => ''])

<textarea {{ $attributes->merge(['class' => 'border-zinc-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm']) }}>{{ $value }}</textarea>
