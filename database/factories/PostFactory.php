<?php

use Faker\Generator as Faker;
use App\Models\Posts;


$factory->define(Posts::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $text = $faker->realText(rand(1000, 4000));
    $isPublished = rand(1, 5) > 1;
    $tags = $faker->words(rand(1, 5));
    $createdAt = $faker->dateTimeBetween('-2 month', '-1 days');

    return [
        'title' => $title,
        'description' => $text,
        'content' => $text,
        // 'slug' => str_slug($title),
        'tags' => implode(', ', $tags),
        'imgurl' => $faker->imageUrl(),
        'category_id' => rand(1, 11),
        'user_id' => (rand(1, 5) == 5) ? 1 : 2,
        'excerpt' => $faker->text(rand(40, 100)),
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $createdAt : null,
        'created_at' => $createdAt,
        'updated_at' => $createdAt
    ];
});
