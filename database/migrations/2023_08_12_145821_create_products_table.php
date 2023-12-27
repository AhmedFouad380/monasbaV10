<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->integer('price')->default(0);
            $table->string('phone')->default(0);
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->enum('type',['sale','rent'])->default('sale');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->enum('active_call',['active','inactive'])->default('inactive');
            $table->enum('active_whatsapp',['active','inactive'])->default('inactive');
            $table->enum('active_chat',['active','inactive'])->default('inactive');
            $table->enum('show_username',['active','inactive'])->default('inactive');
            $table->enum('active_video',['inactive','active'])->default('inactive');
            $table->string('video')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignId('state_id')->constrained('states')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
