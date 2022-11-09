<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'contestant_id', 'voter_id', 'total', 'amount'
    ];

    public function voter()
    {
        return $this->belongsTo(Voter::class);
    }

    public function contestant()
    {
        return $this->belongsTo(Contestant::class);
    }
}
