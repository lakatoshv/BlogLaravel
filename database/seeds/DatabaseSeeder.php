<?php

use App\Models\Posts as Posts;
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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CommentsTableSeed::class);
        factory(Posts::class, 100)->create();
    }
}
