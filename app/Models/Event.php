<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'event_date', 'is_active'];

    protected $casts = [
        'is_active'  => 'boolean',
        'event_date' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('event_date');
    }
}
