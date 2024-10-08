<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Plank\Mediable\Media as PlankMedia;

class Media extends PlankMedia
{
    use HasFactory, HasUuids;
}
