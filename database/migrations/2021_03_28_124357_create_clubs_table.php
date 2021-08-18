<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('school_id')->unsigned();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->unsignedBigInteger('teacher')->unsigned();
            $table->foreign('teacher')->references('id')->on('users')->onDelete('cascade');
            $table->string('logo')->nullable();
            $table->string('code')->nullable()->unique();
            $table->string('status')->nullable();
            $table->string('confirmation')->nullable();
            $table->string('subject')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->text('text')->nullable();
            $table->text('content')->nullable();
            $table->string('permission')->nullable();
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
        Schema::dropIfExists('clubs');
    }
}
