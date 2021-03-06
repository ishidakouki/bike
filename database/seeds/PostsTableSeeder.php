<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {

            $name = str_random(30);
            $year = str_random(30);
            $price = str_random(10);
            $image = "test";
            $explanation = str_random(500);
            $data =
            [
                'user_id' => rand(1,3),
                'name' =>$name,
                'year' => $year,
                'price' => $price,
                'attachment1' => $image,
                'attachment2' => $image,
                'attachment3' => $image,
                'attachment4' => $image,
                'attachment5' => $image,
                'explanation' => $explanation,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('posts')->insert($data);
        }
    }
}
