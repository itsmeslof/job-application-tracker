@props(['event', 'links' => []])

<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg font-semibold flex flex-col gap-2.5 hover:shadow-md transition duration-150 ease items-start w-full">
    <div class="flex items-start gap-4">
        <p class="min-w-[140px] text-zinc-500">Date</p>
        <p class="text-zinc-700">{{ $event->created_at->toFormattedDateString() }}</p>
    </div>
    <div class="flex items-start gap-4">
        <p class="min-w-[140px] text-zinc-500">Event</p>
        <p class="text-zinc-700">{{ $event->title }}</p>
    </div>
    @if ($event->description)
        <div class="flex items-start gap-4">
            <p class="min-w-[140px] text-zinc-500">Description</p>
            <p class="text-zinc-700 whitespace-pre-line" data-extract-links>{{ $event->description }}</p>
        </div>
    @endif

    @if (!empty($links))
        <div class="flex items-center gap-4">
            @foreach ($links as $text => $url)
                <x-link href="{{ $url }}" class="mt-5 inline-block mt-4">
                    {{ $text }}
                </x-link>
            @endforeach
        </div>
    @endif
</div>