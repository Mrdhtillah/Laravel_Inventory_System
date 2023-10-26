<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_type_id'); 
            $table->unsignedBigInteger('item_condition_id'); 
            $table->text('description');
            $table->text('defects')->nullable(); 
            $table->integer('quantity');
            $table->string('image');
            $table->timestamps();

            $table->foreign('item_type_id')->references('id')->on('item_types');
            $table->foreign('item_condition_id')->references('id')->on('item_conditions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
