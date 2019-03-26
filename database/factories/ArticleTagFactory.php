<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ArticleTag::class, function (Faker $faker) {
    return [
        'tag_id' => function() {
            return factory(App\Models\Tag::class)->create()->id;
        },
        'article_id' => function() {
            return factory(App\Models\Article::class)->create()->id;
        }
    ];
});
