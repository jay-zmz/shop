<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//$factory->define(User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'email_verified_at' => now(),
//        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//        'remember_token' => Str::random(10),
//    ];
//});

$factory->define(Goods::class, function (Faker $faker) {
    return [
        'goods_code' => $faker->randomDigit,
        'description' => $faker->word,
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
