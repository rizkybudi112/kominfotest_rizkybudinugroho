<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('base_experience');
            $table->string('weight');
            $table->string('image_path');
            $table->timestamps();
        });

        Schema::create('abilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('pokemon_abilities', function (Blueprint $table) {
            $table->integer('pokemon_id');
            $table->integer('ability_id');
            $table->timestamps();
        });

        Schema::create('api', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->timestamps();
        });
        DB::table('api')->insert([
            ['name' => 'pokemon', 'url' => 'https://pokeapi.co/api/v2/pokemon/']
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
        Schema::dropIfExists('abilities');
        Schema::dropIfExists('pokemon_abilities');
        Schema::dropIfExists('api');
    }
};
