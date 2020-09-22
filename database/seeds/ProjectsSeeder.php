<?php

use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert(['name'=>'Vue first']);
        DB::table('projects')->insert(['name'=>'Insurance preview']);
        DB::table('projects')->insert(['name'=>'Workout']);
    }
}
