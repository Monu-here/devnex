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
            $table->text('how_we_work_icon_1');
            $table->text('how_we_work_text_1');
            $table->text('how_we_work_icon_2');
            $table->text('how_we_work_text_2');
            $table->text('how_we_work_icon_3');
            $table->text('how_we_work_text_3');
            $table->text('how_we_work_icon_4');
            $table->text('how_we_work_text_4');
            $table->text('how_we_work_icon_5');
            $table->text('how_we_work_text_5');

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
