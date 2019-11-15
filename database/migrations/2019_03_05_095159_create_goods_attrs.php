<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsAttrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_attrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
			$table->integer('goods_id');
			$table->integer('attr_id');
			$table->string('attr_value');
			$table->decimal('attr_price', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_attrs');
    }
}
