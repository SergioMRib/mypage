<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name'=>'Environmental Consultancy', 'description'=>'Doing environment stuff and all']);
        DB::table('categories')->insert(['name'=>'Web dev', 'description'=>'Making websites']);
        DB::table('categories')->insert(['name'=>'Music', 'description'=>'Playing and singing in events']);
    }
}
