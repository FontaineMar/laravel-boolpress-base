<?php

use Illuminate\Database\Seeder;
use App\Information;

class informationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Information::class,200)->create()->each(function ($el){
            $el->save();
        });
    }
}
