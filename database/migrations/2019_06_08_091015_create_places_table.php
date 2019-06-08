<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            //$table->primary('id');
            $table->string("title");
            $table->string("address");
            $table->decimal('longitude ', 9, 6);
            $table->decimal('latitude ', 9, 6);
            $table->string("content");
            $table->string("picture");
            $table->string("type");
            $table->foreign('owner_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
