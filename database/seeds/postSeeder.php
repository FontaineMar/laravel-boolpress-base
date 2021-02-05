<?php

use Illuminate\Database\Seeder;
use App\Post;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 100)->create()->each(function ($el){
            $el->save();
        });
    }
}
