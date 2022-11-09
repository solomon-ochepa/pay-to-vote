<?php

namespace App\Http\Livewire\Contestant;

use Livewire\Component;
use Livewire\WithFileUploads;
use Plank\Mediable\HandlesMediaUploadExceptions;

class Create extends Component
{
    use WithFileUploads;
    use HandlesMediaUploadExceptions;

    public $event;
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

    public function render()
    {
        return view('livewire.contestant.create');
    }
}
