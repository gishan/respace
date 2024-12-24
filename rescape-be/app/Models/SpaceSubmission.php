<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaceSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'space_name',
        'location',
        'space_type',
        'space_type_other',
        'primary_motivation',
        'target_demographics',
        'collaboration_style',
        'supported_events',
        'contact_name',
        'contact_email',
        'contact_phone',
    ];

    protected $casts = [
        'target_demographics' => 'array',
        'supported_events' => 'array',
    ];
}
