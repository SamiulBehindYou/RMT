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
        Schema::table('basic_settings', function (Blueprint $table) {
            $table->string('service_page_title')->nullable();
            $table->string('service_page_meta_title')->nullable();
            $table->string('contact_us_page_title')->nullable();
            $table->string('contact_us_page_meta_title')->nullable();
            $table->string('about_us_page_title')->nullable();
            $table->string('about_us_page_meta_title')->nullable();
            $table->string('subscribe_form_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('basic_settings', function (Blueprint $table) {
            $table->dropColumn('service_page_title');
            $table->dropColumn('service_page_meta_title');
            $table->dropColumn('contact_us_page_title');
            $table->dropColumn('contact_us_page_meta_title');
            $table->dropColumn('about_us_page_title');
            $table->dropColumn('about_us_page_meta_title');
            $table->dropColumn('subscribe_form_title');
        });
    }
};
