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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('description_ar')->nullable();;
            $table->string('description_en')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries')->nullOnDelete();
            $table->enum('status',['active','inactive'])->default('active');
            $table->longText('meta_description')->nullable();
            $table->integer('views')->default(0);
            $table->longText('meta_tags')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
