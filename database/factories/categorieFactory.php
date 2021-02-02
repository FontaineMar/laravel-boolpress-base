<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categorie;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Categorie::class, function (Faker $faker) {

    
    return [
       'title' => $faker->word(),
       'slug' => $faker->slug(),
    ];
});
