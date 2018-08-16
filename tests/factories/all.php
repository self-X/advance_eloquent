<?php

use Laracasts\TestDummy\Factory;
use Faker\Generator as Faker;


$factory->define(\App\User::class, function (Faker $faker) {
        return [
            'name'     => $facker->name,
            'email'    => $facker->email,
            'password' =>$facker->word,
        ];
});


$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'user_id' => 'factory:App\User',
        'title'   => $faker->sentence,
        'body'    => $faker->paragraph,
    ];
});


/* $factory->define('App\NewsArticle', function($faker) use ($factory) {
    [
        'name'     => $facker->name,
        'email'    => $facker->email,
        'password' => $facker->word,
    ];
});

$factory->define('App\Post', function($faker) use ($factory) {
    [
        'user_id' => 'factory:App\User',
        'title'   => $faker->sentence,
        'body'    => $faker->paragraph,
    ];
});
 */