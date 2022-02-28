<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Products\Publisher;
use Illuminate\Support\Facades\Storage;

$factory->define(Publisher::class, function (Faker $faker) {
    return [
        'name_en' => $faker->text($maxNbChars = 50),
        'name_ar' => $faker->text($maxNbChars = 50),
        'photo' => $faker->image('public/storage/images/publisher', 400, 300, null, false)
    ];
});
