<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;
use DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [];
        $faker = Factory::create();
        $i;
        $userIds = User::pluck('id')->toArray();

        for($i = 1; $i <= 5; $i++){
            $posts [] = [
                'title' => $faker->sentence(rand(5, 10)),
                'excerpt' => $faker->text,
                'content' => $faker->text,
                'image' => $faker->imageUrl,
                'author_id' => collect($userIds)->random()
            ];
        }
        DB::table("posts")->insert($posts);
    }
}

