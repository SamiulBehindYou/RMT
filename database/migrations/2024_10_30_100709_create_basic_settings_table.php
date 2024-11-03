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
        Schema::create('basic_settings', function (Blueprint $table) {
            $table->id();
            $table->string('web_title');
            $table->text('web_tag_line');
            $table->string('landing_image')->nullable();
            $table->string('icon')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook');
            $table->integer('facebook_status')->default(0);
            $table->string('instagram');
            $table->integer('instagram_status')->default(0);
            $table->string('twiter');
            $table->integer('twiter_status')->default(0);
            $table->string('youtube');
            $table->integer('youtube_status')->default(0);
            $table->string('about_title');
            $table->longText('about_description');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->longText('PrivacyPolicy')->nullable();
            $table->longText('Terms&Conditions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_settings');
    }
};
