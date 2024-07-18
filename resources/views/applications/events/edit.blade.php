<x-app-layout title="Edit Event">
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
                {{ __('Edit Event') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-zinc-900">
                                {{ __('Event Details') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('applications.events.update', [$application, $event]) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PATCH')
                    
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input
                                    id="title"
                                    name="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    :value="old('title', $event->title)"
                                    required
                                    autofocus
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description (optional)')" />
                                <x-textarea-input
                                    id="description"
                                    name="description" 
                                    type="text" 
                                    class="mt-1 block w-full" 
                                    :value="old('description', $event->description)"
                                />
                                <p class="block font-medium text-sm text-zinc-700 mt-1">
                                    The description fields preserves whitespace and extracts urls that match the following pattern:
                                    <span class="bg-zinc-300 rounded-md px-2 inline-block text-zinc-900">
                                        http://&lt;text&gt;, https://&lt;text&gt;
                                    </span>
                                </p>

                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save Event') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <x-application-event-card
                :event="$event"
                :links="[
                    'Delete Event' => route('applications.events.delete', [$application, $event])
                ]"
            />
            <x-application-card :application="$application" />
        </div>
    </div>
</x-app-layout>
