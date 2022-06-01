<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountings', function (Blueprint $table) {
            $table->id();
            //$table->foreignId("user_id")->constrained();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->on("users")->references("id");
            $table->string("date");
            $table->string("type");
            $table->string("categories");
            $table->bigInteger("money");
            $table->string("comment");
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
        Schema::dropIfExists('accountings');
    }
}
