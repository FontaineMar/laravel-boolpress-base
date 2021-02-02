<?php

use Illuminate\Database\Seeder;
use App\Categorie;

class categorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Categorie::class, 200)->create()->each(function ($el){
            $el->save();
        });
    }
}
