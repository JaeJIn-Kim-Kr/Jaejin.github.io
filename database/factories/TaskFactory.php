<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title'             => Str::random(30),
        'content'           => Str::random(150),
        'user_id'           => '1',
        'waste_Chk'         => 'N',
        'progress_Chk'      => 'N',
        'task_rating'       => ''
    ];
});
