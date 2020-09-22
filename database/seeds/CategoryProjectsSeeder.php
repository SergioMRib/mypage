<?php

use Illuminate\Database\Seeder;

class CategoryProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('category_project')->insert(['category_id'=>'1', 'project_id'=>'1']);
        DB::table('category_project')->insert(['category_id'=>'1', 'project_id'=>'2']);
        DB::table('category_project')->insert(['category_id'=>'2', 'project_id'=>'3']);
        DB::table('category_project')->insert(['category_id'=>'3', 'project_id'=>'3']);
        DB::table('category_project')->insert(['category_id'=>'3', 'project_id'=>'1']);

        Schema::enableForeignKeyConstraints();
    }
}
