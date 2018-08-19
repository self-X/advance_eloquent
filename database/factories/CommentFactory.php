<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => function() { 
            return rand(1, 36);
        },
        'body' =>  $faker->paragraph,
    ];
});
