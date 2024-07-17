<x-app-layout title="Create Event">
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
                {{ __('Create Event') }}
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

                        <form method="post" action="{{ route('applications.events.store', $application) }}" class="mt-6 space-y-6">
                            @csrf
                    
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input
                                    id="title"
                                    name="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    :value="old('title')"
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
                                    :value="old('description')"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save Event') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <x-application-card :application="$application" />
        </div>
    </div>
</x-app-layout>
