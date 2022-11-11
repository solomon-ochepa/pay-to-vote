<div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
    <div class="nav-item w-100">
        <form wire:submit.prevent="submit" method="POST" class="rounded position-relative">
            <input class="form-control ps-5 bg-light" min="0" type="number" placeholder="Search by ID..."
                aria-label="Search" required wire:model.lazy="number" />
            <button
                class="@error('number') disabled @enderror btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y"
                type="submit">
                <i class="bi bi-search fs-5"> </i>
            </button>
        </form>
        @error('number')
            <div class="mb-n4 error alert-light rounded px-1">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
