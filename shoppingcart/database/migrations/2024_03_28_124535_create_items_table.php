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
        Schema::create('items', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->binary('image')->nullable();
            $table->double('price');
            $table->timestamps();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onCascade('delete');
        });


        DB::table('items')->insert([[
            'name' => 'shirt',
            'description' => 'a cold t-shirt',
            'image' => null,
            'price' => '100.00',
            'category_id' => '1'
        ], [
            'name' => 'pants',
            'description' => 'a cold pants',
            'image' => null,
            'price' => '200.00',
            'category_id' => '1'
        ], [
            'name' => 'chair',
            'description' => 'a place to sit',
            'image' => null,
            'price' => '50.00',
            'category_id' => '2'
        ], [
            'name' => 'bed',
            'description' => 'a place to sleep',
            'image' => null,
            'price' => '5000.00',
            'category_id' => '2'
        ], [
            'name' => 'steak',
            'description' => 'a meat to eat',
            'image' => null,
            'price' => '5.00',
            'category_id' => '3',
        ], [
            'name' => 'chicken',
            'description' => 'the best meat',
            'image' => null,
            'price' => '50.00',
            'category_id' => '3'
        ]]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
