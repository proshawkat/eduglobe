<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['name', 'flag', 'country_code', 'slug', 'description', 'details', 'image_url', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function getFlagImageAttribute(): string
    {
        if ($this->country_code) {
            return 'https://flagcdn.com/w20/' . strtolower($this->country_code) . '.png';
        }
        return '';
    }

    public function getUrlAttribute(): string
    {
        return route('study-abroad.show', $this->slug ?? $this->id);
    }
}
