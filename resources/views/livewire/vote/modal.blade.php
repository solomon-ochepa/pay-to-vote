<div wire:ignore.self class="modal fade" id="vote-modal" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form wire:submit.prevent="save" method="POST">
                <div class="modal-header">
                    @if ($modal->id)
                        <h5 class="modal-title" id="modalLabelCreateAlbum">
                            Vote: {{ $modal->user->first_name }} {{ $modal->user->last_name }}
                            (#{{ $modal->number }})
                        </h5>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-4">
                        <!-- Title -->
                        <div class="col-8">
                            <label class="form-label" for="voter-name">Name</label>
                            <input type="text" id="voter-name" class="form-control" placeholder="e.g. Solomon Oki"
                                wire:model.defer="voter.name">
                        </div>

                        <!-- Title -->
                        <div class="col-4">
                            <label class="form-label" for="voter-phone">Phone</label>
                            <input type="tel" id="voter-phone" class="form-control" placeholder="0816xxxxxxx"
                                required wire:model.defer="voter.phone">
                        </div>

                        <!-- Amount -->
                        <div class="col-sm-8">
                            <label class="form-label">Amount</label>
                            <input type="number" id="amount" step="50" min="50" class="form-control"
                                placeholder="N" required wire:model="amount" wire:change="amount()">
                        </div>

                        <!-- Votes -->
                        <div class="col-sm-4">
                            <label class="form-label">Votes</label>
                            <input type="number" id="votes" step="1" min="1" class="form-control"
                                placeholder="0" required wire:model="votes" wire:change="votes()"
                                wire:keydown="votes()">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-success-soft">Vote now</button>
                </div>
            </form>
        </div>
    </div>
</div>
