<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(MyCompany\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});



$factory->define(MyCompany\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence
    ];
});



$factory->define(MyCompany\Team::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'size' => 5
    ];
});


$factory->define(MyCompany\Post::class, function(Faker\Generator $faker){
	
	return [
		'title' => $faker->sentence,
		'body'	=> $faker->paragraph,
		'user_id' => factory(MyCompany\User::class)->create()->id
	];
	
});


