<?php

$factory('Learn\Models\Tag', [
    'name' => $faker->name,
    'slug' => $faker->word,
    'description' => $faker->paragraph()
]);