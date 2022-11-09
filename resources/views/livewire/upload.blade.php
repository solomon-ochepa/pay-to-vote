<form method="POST" enctype="multipart/form-data" wire:submit.prevent="save">
    <!-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. -->
    @isset($header)
        {!! $header !!}
    @endisset

    @if ($file and !empty($file->temporaryUrl()))
        <img src="{{ $file->temporaryUrl() }}" class="rounded mb-2" width="100%" style="max-width: 100%">
    @elseif($media)
        <img src="{{ $media->getUrl() }}" class="rounded mb-2" width="100%" style="max-width: 100%">
    @endif

    @if ($display ?? '' == 'dropzone')
        <div>
            {{-- <label class="form-label">Upload photo</label> --}}
            <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":1}'>
                <div class="dz-message">
                    <i class="bi bi-file-earmark-text display-3"></i>
                    <p>Drop your recent picture here or click to upload.</p>
                </div>
            </div>
        </div>
    @else
        <div class="input-group input-group-sm">
            <input type="file" class="form-control" id="file" aria-label="Upload Proof of payment"
                title="Upload your picture here" required wire:model="file" tooltip />

            {{-- <button class="btn btn-default btn-outline-light input-group-text" type="submit" aria-label="Submit">
                {{ $media ? 'Update' : $button ?? 'Submit' }}
            </button> --}}
        </div>
    @endif
    @error('file')
        <span class="error">{{ $message }}</span>
    @enderror

    <div wire:loading wire:target="file">loading...</div>
</form>
