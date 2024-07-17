@props(['application', 'events'])

<div class="flex flex-col items-start gap-5">
    <div class="w-full flex justify-between items-center">
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            Activity
        </h2>

        <x-link :href="route('applications.events.create', $application)">
            Log Activity
        </x-link>
    </div>

    @forelse ($events as $event)
        <x-application-event-card
            :event="$event"
            :links="$event->editable ? [
                'Edit Event' => route('applications.events.edit', [$application, $event]),
                'Delete Event' => route('applications.events.delete', [$application, $event]),
            ] : []"
        />
    @empty
        <p class="text-zinc-700 font-medium text-lg">No events found</p>
    @endforelse
</div>
