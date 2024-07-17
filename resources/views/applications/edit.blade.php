<x-app-layout title="Edit Application">
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
                {{ __('Edit Application') }}
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
                                {{ __('Application Details') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('applications.update', $application) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PATCH')
                    
                            <div>
                                <x-input-label for="company" :value="__('Company')" />
                                <x-text-input
                                    id="company"
                                    name="company" 
                                    type="text" 
                                    class="mt-1 block w-full" 
                                    :value="old('company', $application->company)"
                                    required
                                    autofocus
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('company')" />
                            </div>

                            <div>
                                <x-input-label for="role" :value="__('Role')" />
                                <x-text-input
                                    id="role"
                                    name="role" 
                                    type="text" 
                                    class="mt-1 block w-full" 
                                    :value="old('role', $application->role)"
                                    required
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('role')" />
                            </div>

                            <div>
                                <x-input-label for="compensation" :value="__('Compensation')" />
                                <x-text-input
                                    id="compensation"
                                    name="compensation" 
                                    type="text" 
                                    class="mt-1 block w-full" 
                                    :value="old('compensation', $application->compensation)"
                                    required
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('compensation')" />
                            </div>

                            <div>
                                <x-input-label for="location" :value="__('Location')" />
                                <x-text-input
                                    id="location"
                                    name="location" 
                                    type="text" 
                                    class="mt-1 block w-full" 
                                    :value="old('location', $application->location)"
                                    required
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('location')" />
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save Application') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <x-application-card :application="$application" />
        </div>
    </div>
</x-app-layout>
