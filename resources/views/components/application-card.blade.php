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
    <div class="flex items-center gap-4">
        <p class="min-w-[140px] text-zinc-500 text-sm">Company</p>
        <p class="text-zinc-700 text-lg">{{ $application->company }}</p>
    </div>
    <div class="flex items-center gap-4">
        <p class="min-w-[140px] text-zinc-500 text-sm">Role</p>
        <p class="text-zinc-700 text-lg">{{ $application->role }}</p>
    </div>
    <div class="flex items-center gap-4">
        <p class="min-w-[140px] text-zinc-500 text-sm">Compensation</p>
        <p class="text-zinc-700 text-lg">{{ $application->compensation }}</p>
    </div>
<div class="flex items-center gap-4">
        <p class="min-w-[140px] text-zinc-500 text-sm">Location</p>
        <p class="text-zinc-700 text-lg">{{ $application->location }}</p>
    </div>

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
