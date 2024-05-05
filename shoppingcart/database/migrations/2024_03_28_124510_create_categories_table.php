<?php

use App\Models\Category;
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
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });


        DB::table('categories')->insert([[
            'name' => 'clothes',
            'description' => 'stuff you can wear'
        ],[
            'name' => 'furniture',
            'description' => 'stuff you can put in the house'
        ], [
            'name' => 'food',
            'description' => 'stuff you can eat'
        ]]);


        // $data = array(
        //     [
        //         'name' => 'clothes',
        //         'description' => 'stuff you can wear'
        //     ],
        //     [
        //         'name' => 'furniture',
        //         'description' => 'stuff you can put in the house'
        //     ]);

        // foreach($data as $d){
        //     $category = new Category();
        //     $category->name = $d['name'];
        //     $category->save();
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};