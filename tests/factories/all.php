<?php

$factory('Learn\Models\Tag', [
    'name' => $faker->name,
    'slug' => $faker->word,
    'description' => $faker->paragraph()
]);

$factory('Learn\Models\Format', [
    'name' => $faker->name,
    'plural' => $faker->word,
    'slug' => $faker->word,
    'icon' => 'book',
    'order' => 0
]);