<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 50),
        'desc' => $faker->paragraph,
        'rate' => $faker->numberBetween(1, 5),
        'price' => $faker->randomDigit,
        'type' => $faker->randomElement(['purchasable', 'downloadable']),
        'discount' => 0,
        'new_price' => 0,
        'category_id' => factory('App\Models\Products\Category')->create()->id,
        'publisher_id' => factory('App\Models\Products\Publisher')->create()->id,
        'author_id' => factory('App\Models\Products\Author')->create()->id,
        'photo' => $faker->file($sourceDir = 'D:/picture', $targetDir = 'storage/app/public/images/author', false),
        'file' => null,
    ];
});
