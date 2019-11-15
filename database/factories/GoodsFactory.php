<?php

use Faker\Generator as Faker;

$factory->define(\App\Goods::class, function (Faker $faker) {
    return [
        'goods_code' => $faker->randomDigit,
        'description' => $faker->word,
        'goods_name' => $faker->bothify('goods- ##??'),
        'market_price' => $faker->numberBetween(0, 100),
        'shop_price' => $faker->numberBetween(0, 50),
        'brand_id' => 1, // password
        'on_sale' => 1, // password
        'cate_id' => 1, // password
        'type_id' => 1, // password
        'goods_weight' => 1, // password
        'weight_unit' => 'KG',
    ];
});
