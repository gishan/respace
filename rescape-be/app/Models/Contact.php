<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'message',
        'company_name',
        'is_synced_to_sheets',
    ];

    protected $casts = [
        'is_synced_to_sheets' => 'boolean',
    ];
}
