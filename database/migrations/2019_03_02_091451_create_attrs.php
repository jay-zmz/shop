<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('attr_name');
            $table->string('attr_value');
            $table->integer('type_id');
            $table->integer('attr_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attrs');
    }
}
