<?php

use App\User;
use App\Question;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});




$factory->define(Question::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence(10),
        'pointAmount' => $faker->numberBetween(10,1000),
        'startDate' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'finishDate' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'answer1' => $faker->word,
        'answer2' => $faker->word,
        'answer3' => $faker->word,
        'answer4' => $faker->word,
        'nbAnswer1' => $faker->numberBetween(10,1000),
        'nbAnswer2' => $faker->numberBetween(10,1000),
        'nbAnswer3' => $faker->numberBetween(10,1000),
        'nbAnswer4' => $faker->numberBetween(10,1000),
        'nbShown' => $faker->numberBetween(1000,10000),
        'nbAnswers' => $faker->numberBetween(1000,10000),
        'active' => $faker -> numberBetween(0,1),
        'category_id' => $faker -> numberBetween(1,2),
        'campaign_id' => 1,
        'user_id' => $faker -> numberBetween(1,2),


    ];

});