<x-app-layout title="My Applications">
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
                {{ __('My Applications') }}
            </h2>

            <x-link href="{{ route('applications.create') }}">
                New Application
            </x-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div
                class="border-b border-zinc-200 flex"
            >
                <a
                    href="{{ route('applications.index') }}"
                    class="p-3 border-b-2 text-lg font-medium inline-block {{ request()->routeIs('applications.index') ? 'text-sky-600 border-sky-600' : 'border-transparent hover:border-zinc-300' }}"
                >
                    In Progress
                </a>
                <a
                    href="{{ route('applications.closed') }}"
                    class="p-3 border-b-2 text-lg font-medium inline-block {{ request()->routeIs('applications.closed') ? 'text-sky-600 border-sky-600' : 'border-transparent hover:border-zinc-300' }}"
                >
                    Closed
                </a>   

            </div>

            @forelse ($applications as $application)
                <x-application-card
                    :application="$application"
                    :links="[
                        'Manage Application' => route('applications.show', $application),
                    ]"
                />
            @empty
                <p class="text-zinc-700 font-medium text-lg">No applications found</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
