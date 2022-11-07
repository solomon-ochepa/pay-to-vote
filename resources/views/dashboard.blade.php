<x-app-sidebars-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @isset($events)
                @foreach ($events as $event)
                    <livewire:event.feed.card :event="$event" />
                @endforeach
            @else
                No events, please <a href="{{ route('office.event.create') }}">create new event</a>
            @endisset
        </div>
    </div>
</x-app-sidebars-layout>
