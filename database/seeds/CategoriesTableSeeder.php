<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name'=> 'Моющие средства', 'code'=> 9843, 'description'=>''],
            ['name'=> 'Галантерея', 'code'=> 6721, 'description'=>''],
        ]);
    }
}
