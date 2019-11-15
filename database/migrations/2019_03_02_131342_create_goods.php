<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('goods_name');
            $table->string('goods_code');
            $table->string('description');
            $table->string('og_thumb');
            $table->string('big_thumb');
            $table->string('mid_thumb');
            $table->string('sm_thumb');
            $table->decimal('market_price', 8, 2);
            $table->decimal('shop_price', 8, 2);
            $table->integer('brand_id');
            $table->integer('on_sale');
            $table->integer('cate_id');
            $table->integer('type_id');
            $table->decimal('goods_weight', 8, 2);
            $table->string('weight_unit');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
