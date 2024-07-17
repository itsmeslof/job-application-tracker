<x-app-layout title="Close Application">
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
                {{ __('Close Application') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <x-application-card :application="$application" />

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('applications.close', $application) }}" class="flex flex-col gap-y-6">
                            @csrf

                            <div>
                                <x-input-label for="closed_reason" :value="__('Reason for closing (optional)')" />
                                <x-text-input
                                    id="closed_reason"
                                    name="closed_reason" 
                                    type="text" 
                                    class="mt-1 block w-full" 
                                    :value="old('closed_reason')"
                                    autofocus
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('closed_reason')" />
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Close Application') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
