<?php

namespace App\Http\Livewire;

use App\Notifications\AdminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Livewire\Component;
use Livewire\WithFileUploads;
use Plank\Mediable\Facades\MediaUploader;

class Upload extends Component
{
    use WithFileUploads;
    use HandlesMediaUploadExceptions;

    public $file;

    public $button;
    public $mediable_type;
    public $mediable_id;
    public $media = [];
    public $status = false;
    public $user;

    public $prefix;
    public $max = (1024 * 1000); // KB * MB Max
    public $model;

    function mount($mediable_type = null, $mediable_id = null, $status = false)
    {
        $this->status = $status;
        $this->prefix = date("Y/m/d/");

        $this->model = "App\Models\\$this->mediable_type";
        $this->model = $this->model::find($this->mediable_id);

        if ($this->model->media and $this->model->media->first())
            $this->media = $this->model->media->first();
        else
            $this->media = null;
    }

    public function render()
    {
        return view('livewire.upload');
    }

    public function updatedFile()
    {
        $this->validate([
            'file' => "image|max:{$this->max}",
        ]);
    }

    // Notice: Transaction can have only one "Proof of Payment"
    public function save(Request $request)
    {
        $this->validate([
            'file' => ['image', "max:{$this->max}", "mimes:jpg,jpeg,png,pdf"],
        ]);

        $this->user = auth()->user();

        // Upload file
        $upload = MediaUploader::fromSource($this->file->path())
            ->toDisk('images')
            ->toDirectory($this->prefix)
            ->setAllowedExtensions(['jpg', 'jpeg', 'png'])
            ->onDuplicateUpdate()
            ->useHashForFilename()
            ->makePrivate()
            ->upload();

        // Media table entry
        if ($upload) {
            if ($this->media) {
                // Replace existing media
                $this->model->syncMedia($upload, ['receipt']);

                session()->flash('status', 'Document updated successfully.');
                return back();
            } else {
                // Store new media
                if ($this->model) {
                    $this->model->attachMedia($upload, ['receipt']);
                }

                session()->flash('status', 'Document uploaded successfully.');
                return back();
            }
        } else {
            session()->flash('status', 'Error uploading document');
            return back()->withInput();
        }
    }
}
