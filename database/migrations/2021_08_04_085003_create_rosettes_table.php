<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRosettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rosettes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('rosettes');
    }
}
