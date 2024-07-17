@php
$isClosed = $application->is_closed;
$links = [];

$openCloseText = $isClosed ? 'Re-Open Application' : 'Close Application';
$openCloseUrl = route($isClosed ? 'applications.open' : 'applications.close', $application);

$links[$openCloseText] = $openCloseUrl;
$links['Delete Application'] = route('applications.delete', $application);
@endphp

<x-app-layout title="{{ $application->role }}, {{ $application->company }}">
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
                Manage Application
            </h2>

            <x-link href="{{ route('applications.edit', $application) }}">
                Edit Application
            </x-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-application-card
                :application="$application"
                :links="$links"
            />

            <x-application-events :application="$application" :events="$events" />
        </div>
    </div>
</x-app-layout>
