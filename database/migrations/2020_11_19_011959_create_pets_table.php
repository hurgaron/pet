<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string( 'name', 120);
            $table->string( 'address', 120);
            $table->string( 'city', 80);
            $table->string( 'state', 80);
            $table->string( 'hours', 80);
            $table->decimal( 'latitude', 8, 6);
            $table->decimal( 'longitude', 9, 6);
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
        Schema::dropIfExists('pets');
    }
}
