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

    <div class="input-group input-group-sm">
        <input type="file" class="form-control" id="file" aria-label="Upload Proof of payment"
            title="Upload receipt or screenshot of payment" required wire:model="file" tooltip />
        <button class="btn btn-default btn-outline-light input-group-text" type="submit" aria-label="Submit">
            {{ $media ? 'Update' : $button ?? 'Submit' }}
        </button>
    </div>
    @error('file')
        <span class="error">{{ $message }}</span>
    @enderror

    <div wire:loading wire:target="file">loading...</div>
</form>
