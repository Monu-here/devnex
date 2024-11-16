<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->text('home_text');
            $table->text('home_description');
            $table->text('btn_text');
            $table->json('achievements_number');
            $table->json('achievements_name');
            $table->json('approch_name');
            $table->json('approch_desc');
            $table->json('approch_image');
            $table->json('service_name');
            $table->json('service_desc');
            $table->json('service_image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
