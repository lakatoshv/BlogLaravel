<?php

use Illuminate\Database\Seeder;

class CommentsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("comments")->insert(
        	array(
        		[
	        		"post_id" => 4,
	        		"author" => "Katy Liu",
	        		"comment" => "Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.",
	        	],
	        	[
	        		"post_id" => 4,
	        		"author" => "Katy Liu",
	        		"comment" => "Nulla facilisi. Aenean porttitor quis tortor id tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus molestie varius tincidunt. Vestibulum congue sed libero ac sodales.",
	        	],
	        	[
	        		"post_id" => 5,
	        		"author" => "Katy Liu",
	        		"comment" => "Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.",
	        	],

	        	[
	        		"post_id" => 5,
	        		"author" => "Katy Liu",
	        		"comment" => "Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.",
	        	],
	        	[
	        		"post_id" => 5,
	        		"author" => "Katy Liu",
	        		"comment" => "Nulla facilisi. Aenean porttitor quis tortor id tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus molestie varius tincidunt. Vestibulum congue sed libero ac sodales.",
	        	],
	        	[
	        		"post_id" => 5,
	        		"author" => "Katy Liu",
	        		"comment" => "Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.",
	        	],

	        	[
	        		"post_id" => 6,
	        		"author" => "Katy Liu",
	        		"comment" => "Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.",
	        	],
	        	[
	        		"post_id" => 6,
	        		"author" => "Katy Liu",
	        		"comment" => "Nulla facilisi. Aenean porttitor quis tortor id tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus molestie varius tincidunt. Vestibulum congue sed libero ac sodales.",
	        	],
	        	[
	        		"post_id" => 6,
	        		"author" => "Katy Liu",
	        		"comment" => "Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.",
	        	],
        	)
        );
    }
}
