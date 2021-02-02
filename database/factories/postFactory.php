<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Carbon\Carbon; 

$factory->define(App\Post::class, function (Faker $faker) {

    
    return [
    //    'category_id' => $faker->randomDigitNot(200),
       'title' => $faker->word(),
       'author' => $faker->name(),
    ];
});