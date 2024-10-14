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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unique();
            $table->string('name');
            $table->integer('brand');
            $table->integer('subcategory');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('after_discount');
            $table->string('made_in');
            $table->string('tags');
            $table->string('image');
            $table->text('short_description');
            $table->longText('description');
            $table->integer('tax')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
