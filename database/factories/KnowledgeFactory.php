<?php

use Faker\Generator as Faker;
use App\Models\KnowledgeBase;

$factory->define(KnowledgeBase::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'department_id' => 1,
        'content' => $faker->text,
        'user_id' => 1,
        'status' => 1,
    ];
});
