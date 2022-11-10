<x-app-layout>
    <div class="col-lg-3">
        <livewire:layouts.app.sidebar />
    </div>

    <div class="col-lg-9 col-md-8 vstack gap-4">
        {{ $slot }}
    </div>
</x-app-layout>
