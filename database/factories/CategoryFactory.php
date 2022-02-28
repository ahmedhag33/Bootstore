<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_en' => $faker->text($maxNbChars = 50),
        'name_ar' => $faker->text($maxNbChars = 50),
    ];
});
