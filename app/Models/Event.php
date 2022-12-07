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

    public $limit = 30;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'slug', 'min_vote', 'vote_cost', 'started_at', 'ended_at', 'about', 'default'
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
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    protected $with = [
        'contestants'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function contestants()
    {
        $contestants = $this->hasMany(Contestant::class)->active()->latest('updated_at')->limit($this->limit);
        $contestants->each(function ($contestant) {
            // $contestant->active     = 1;
            $contestant->voted      = $contestant->votes->sum('total');
            $contestant->save();
        });

        return $contestants;
    }

    public function leaderboard()
    {
        return $this->hasMany(Contestant::class)->active()->orderBy('voted', 'desc')->limit($this->limit);
    }

    public function votes()
    {
        return $this->hasManyThrough(Vote::class, Contestant::class);
    }

    public function voters()
    {
        return $this->hasManyThrough(Voter::class, Vote::class, 'event_id', 'id', 'id', 'voter_id')->distinct()->limit($this->limit);
    }

    public function voted()
    {
        return $this->hasManyThrough(Voter::class, Vote::class, 'event_id', 'id', 'id', 'voter_id')->count();
    }
}
