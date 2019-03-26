<?php

use Faker\Generator as Faker;
use Faker\Provider\Lorem;
use Faker\Provider\Image;

$factory->define(App\Models\Article::class, function (Faker $faker) {
     
    $description = $faker->text($maxNbChars = 100);
    $image_url = $faker->imageUrl($width = 640, $height = 480);
    $description_2 = $faker->text($maxNbChars = 250);
    $content = $description.' <img src="'.$image_url.'" /> '. $description_2;
    return [
        'title' => $faker->text($maxNbChars = 50),
        'description' => $content,
        'category_id' => function() {
            return factory(App\Models\Category::class)->create()->id;
        },
        'status' => 1,
        'user_id' => function() {
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});
