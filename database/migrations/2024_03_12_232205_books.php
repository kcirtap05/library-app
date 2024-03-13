<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Books extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->bigInteger('library_id')->notNullable()->default(0)->index();
            $table->string('title', '255')->nullable()->index();
            $table->string('author', '255')->nullable();
            $table->string('status', '200')->nullable()->default('available');
            $table->softDeletes();
            $table->timestamps();

            // Indexes
            $table->index(['id', 'library_id']);
            $table->index(['id', 'library_id','title']);
            $table->index(['library_id','title']);
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
        Schema::dropIfExists('books');
    }
}
