<x-app-sidebar-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Event') }}
        </h2>
    </x-slot>

    @can(['event.create'])
        <div class="col-md-8 col-lg-6 vstack gap-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('office.event.store') }}">
                        @csrf

                        <div class="row  g-3">
                            <div class="col-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="start_at" class="form-label">Starting</label>
                                <input type="datetime-local" class="form-control" id="start_at" name="start_at">
                            </div>
                            <div class="col-md-6">
                                <label for="end_at" class="form-label">Ending</label>
                                <input type="datetime-local" class="form-control" id="end_at" name="end_at">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="active" name="active">
                                    <label class="form-check-label" for="active">
                                        Activate?
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
</x-app-sidebar-layout>
