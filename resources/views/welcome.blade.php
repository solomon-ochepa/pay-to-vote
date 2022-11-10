<x-app-sidebar-right-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @isset($events)
                @foreach ($events as $event)
                    <livewire:event.feed.card :event="$event" />
                @endforeach
            @else
                No events, please <a href="{{ route('event.create') }}">create new event</a>
            @endisset
        </div>
    </div>
</x-app-sidebar-right-layout>
