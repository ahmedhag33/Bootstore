<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Products\Publisher;


$factory->define(Publisher::class, function (Faker $faker) {
    return [
        'name_en' => $faker->text($maxNbChars = 50),
        'name_ar' => $faker->text($maxNbChars = 50),
        'photo' => $faker->file($sourceDir = 'D:/picture', $targetDir = 'storage/app/public/images/publisher', false)
    ];
});
