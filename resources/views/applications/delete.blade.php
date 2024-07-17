<x-app-layout title="Delete Application">
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
                {{ __('Delete Application') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <x-application-card :application="$application" />

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-zinc-900">
                                Are you sure you want to delete this Application? All data will be lost. This action can not be reversed.
                            </h2>
                        </header>

                        <form method="post" action="{{ route('applications.destroy', $application) }}" class="flex flex-col mt-6 gap-y-6">
                            @csrf
                            @method('DELETE')
                    
                            <div class="flex items-center gap-4">
                                <x-danger-button>{{ __('Delete Application') }}</x-danger-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
