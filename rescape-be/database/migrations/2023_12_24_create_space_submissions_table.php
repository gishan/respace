<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('space_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('space_name');
            $table->text('location');
            $table->string('space_type');
            $table->string('space_type_other')->nullable();
            $table->string('primary_motivation');
            $table->json('target_demographics');
            $table->string('collaboration_style');
            $table->json('supported_events');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('space_submissions');
    }
};
