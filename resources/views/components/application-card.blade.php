@props(['application', 'links' => []])

<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg font-semibold flex flex-col gap-2.5 hover:shadow-md transition duration-150 ease items-start">
    @if ($application->is_closed)
        <div class="bg-rose-300/20 text-rose-400 rounded-lg py-1 px-2">
            Closed {{ $application->closed_reason ? "- {$application->closed_reason}" : "" }}
        </div>
    @else
        <div class="bg-sky-300/20 text-sky-400 rounded-lg py-1 px-2">
            In Progress
        </div>
    @endif
    <div class="flex items-start gap-4">
        <p class="min-w-[140px] text-zinc-500">Company</p>
        <p class="text-zinc-700">{{ $application->company }}</p>
    </div>
    <div class="flex items-start gap-4">
        <p class="min-w-[140px] text-zinc-500">Role</p>
        <p class="text-zinc-700">{{ $application->role }}</p>
    </div>
    <div class="flex items-start gap-4">
        <p class="min-w-[140px] text-zinc-500">Compensation</p>
        <p class="text-zinc-700">{{ $application->compensation }}</p>
    </div>
    <div class="flex items-start gap-4">
        <p class="min-w-[140px] text-zinc-500">Location</p>
        <p class="text-zinc-700">{{ $application->location }}</p>
    </div>
    @if ($application->description)
        <div class="flex items-start gap-4">
            <p class="min-w-[140px] text-zinc-500">Description</p>
            <p class="text-zinc-700 whitespace-pre-line" data-extract-links>{{ $application->description }}</p>
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
