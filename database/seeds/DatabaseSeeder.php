<?php

use Illuminate\Database\Seeder;

/**
 * Database seeder.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(PostsTableSeeder::class);
        $this->call(CommentsTableSeed::class);
    }
}
