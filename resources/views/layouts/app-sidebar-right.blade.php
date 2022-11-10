<x-app-layout>
    <div class="col-lg-8 vstack gap-4">
        {{ $slot }}
    </div>

    <div class="col-lg-4">
        <livewire:layouts.app.sidebar-right />
    </div>
</x-app-layout>
