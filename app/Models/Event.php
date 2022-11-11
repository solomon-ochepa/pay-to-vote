<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Event extends Model
{
    use HasFactory, HasUuids, Sluggable;
    use Mediable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'slug', 'start_at', 'end_at'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function contestants()
    {
        return $this->hasMany(Contestant::class)->with('votes')->orderByDesc(
            Vote::select('total')
                ->whereColumn('contestant_id', 'contestants.id')
                ->orderByDesc('total')
                ->limit(1)
        ); //->withPivot('event_id');
    }

    public function leaderboard()
    {
        return $this->hasMany(Contestant::class)->latest();
    }

    public function votes()
    {
        return $this->hasManyThrough(Vote::class, Contestant::class);
    }

    public function voters()
    {
        return $this->hasManyThrough(Voter::class, Vote::class, 'event_id', 'id', 'id', 'voter_id')->distinct();
    }

    public function voted()
    {
        return $this->hasManyThrough(Voter::class, Vote::class, 'event_id', 'id', 'id', 'voter_id')->count();
    }
}
