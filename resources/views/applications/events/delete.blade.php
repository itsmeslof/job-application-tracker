<x-app-layout title="Delete Event">
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
                {{ __('Delete Event') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-zinc-900">
                                Are you sure you want to delete this Event? This action can not be reversed.
                            </h2>
                        </header>

                        <form method="post" action="{{ route('applications.events.destroy', [$application, $event]) }}" class="flex flex-col mt-6 gap-y-6 max-w-xl">
                            @csrf
                            @method('DELETE')
                    
                            <div class="flex items-center gap-4">
                                <x-danger-button>{{ __('Delete Event') }}</x-danger-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <x-application-event-card :event="$event" />
            <x-application-card :application="$application" />
        </div>
    </div>
</x-app-layout>
