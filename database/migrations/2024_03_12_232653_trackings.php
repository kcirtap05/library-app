<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trackings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('trackings', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->bigInteger('user_id')->notNullable()->default(0)->index();
            $table->bigInteger('book_id')->notNullable()->default(0)->index();
            $table->date('tracking_date')->nullable();
            $table->date('returned_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Indexes
            $table->index(['id', 'user_id']);
            $table->index(['id', 'book_id']);
            $table->index(['id', 'user_id', 'book_id']);
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
        Schema::dropIfExists('trackings');
    }
}
