<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'product_category',
        'product_category_other',
        'brand_stage',
        'activation_purpose',
        'experience_type',
        'showcase_preference',
        'target_demographic',
        'target_demographic_specific',
        'location_type',
        'space_size',
        'amenities',
        'budget',
        'timeline',
        'duration',
        'special_requirements',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_company',
        'contact_role'
    ];

    protected $casts = [
        'target_demographic' => 'array',
        'amenities' => 'array'
    ];
}
