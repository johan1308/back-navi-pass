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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->unsignedBigInteger('category_id'); // Cambia a 'category_id'
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });


        Schema::create('credentials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->timestamps(); // Agrega 'created_at' y 'updated_at'
        });

        
        Schema::create('additional_informations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('values');
            $table->timestamps();
            $table->unsignedBigInteger('credential_id'); // Cambia a 'credential_id'
            $table->foreign('credential_id')->references('id')->on('credentials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('credentials');
        Schema::dropIfExists('additional_information');
    }
};
