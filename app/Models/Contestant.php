<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Contestant extends Model
{
    use HasFactory, HasUuids, Sluggable;
    use Mediable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'active', 'first_name', 'last_name', 'number', 'event_id', 'user_id', 'votes', 'about',
    ];

    protected $with = [
        'votes'
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
                'source' => ['first_name', 'last_name']
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

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class)->active();
    }

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => ucfirst($attributes['first_name'])
                . ' '
                . ucfirst($attributes['last_name']),
        );
    }

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    /**
     * Get the user's last name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function lasttName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
