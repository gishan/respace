<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'location', 
        'description', 
        'amenities', 
        'price_per_day', 
        'status'
    ];

    protected $casts = [
        'amenities' => 'array',
        'price_per_day' => 'decimal:2'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
