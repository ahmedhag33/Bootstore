<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name_en' => $faker->text($maxNbChars = 50),
        'name_ar' => $faker->text($maxNbChars = 50),
        'desc_en' => $faker->paragraph(),
        'desc_ar' => $faker->paragraph(),
        'rate' => $faker->numberBetween(1, 5),
        'photo' => $faker->file($sourceDir = 'D:/picture', $targetDir = 'storage/app/public/images/author', false)
    ];
});
