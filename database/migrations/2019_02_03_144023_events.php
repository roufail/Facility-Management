<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('city');
            $table->string('location');
            $table->Integer('invites');
            $table->enum('status',['pending','approved','draft','rejected'])->default('draft');
            $table->enum('caterings_status',['approved','rejected'])->nullable();
            $table->enum('transportations_status',['approved','rejected'])->nullable();
            $table->enum('hotels_status',['approved','rejected'])->nullable();
            $table->enum('maintenances_status',['approved','rejected'])->nullable();
            $table->longText('description')->nullable();
            $table->date('date_from');		
            $table->date('date_to');		
            $table->time('time_from');		
            $table->time('time_to');		
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
        Schema::dropIfExists('events');
    }
}
