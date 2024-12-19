<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('brand_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('product_category');
            $table->string('product_category_other')->nullable();
            $table->string('brand_stage');
            $table->string('activation_purpose');
            $table->string('experience_type');
            $table->string('showcase_preference');
            $table->json('target_demographic');
            $table->string('target_demographic_specific')->nullable();
            $table->string('location_type');
            $table->string('space_size');
            $table->json('amenities');
            $table->string('budget');
            $table->string('timeline');
            $table->string('duration');
            $table->text('special_requirements')->nullable();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('contact_company');
            $table->string('contact_role');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brand_inquiries');
    }
};
