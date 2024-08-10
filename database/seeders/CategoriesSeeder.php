<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fake du lieu Catego
        $fake = Faker::create();
        foreach(range(0 , 5) as $index){
            DB::table('Categories')->insert([
                'name'=> $fake->name,
                'description'=>$fake->text,
            ]);
        }
    }
}
