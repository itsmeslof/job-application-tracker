@php

$isClosed = $application->is_closed;

$linkText = $isClosed ? 'Re-Open Application' : 'Close Application';
$linkUrl = $isClosed ? route('applications.open', $application) : route('applications.close', $application);

$links = [
    $linkText => $linkUrl,
    'Delete Application' => route('applications.delete', $application),
];

@endphp

<x-app-layout title="{{ $application->role }}, {{ $application->company }}">
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
                {{ $application->role }}, {{ $application->company }}
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
        </div>
    </div>
</x-app-layout>
