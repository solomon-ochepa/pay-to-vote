<x-app-layout>
    <livewire:layouts.app.sidebar />

    <div class="col-md-8 col-lg-6 vstack gap-4">
        {{ $slot }}
    </div>

    <livewire:layouts.app.sidebar-right />
</x-app-layout>
