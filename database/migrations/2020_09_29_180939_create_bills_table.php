<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Main
            $table->string('title');
            $table->string('description');
            $table->string('price');
            $table->string('image_url');

            // Foreign keys

            $table->bigInteger('creator_id')->nullable()->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('cat_id')->nullable()->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');

            $table->bigInteger('building_id')->nullable()->unsigned();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');

            $table->bigInteger('item_id')->nullable()->unsigned();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

            // Time stamp
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
        Schema::dropIfExists('bills');
    }
}
