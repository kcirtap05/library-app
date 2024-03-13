<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libraries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('libraries', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('name', '255')->nullable();
            $table->string('location', '255')->nullable();
            $table->string('status', '200')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Indexes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('libraries');
    }
}
