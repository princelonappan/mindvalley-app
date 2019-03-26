<?php

use Faker\Generator as Faker;
use Faker\Provider\Lorem as Lorem;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    
    return [
        'name' => $faker->word
    ];
});
