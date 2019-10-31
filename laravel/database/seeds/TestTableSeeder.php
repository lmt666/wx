<?php

use Illuminate\Database\Seeder;


class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('test')->insert(['name'=>'666']);
        //DB::table('test')->insert(['name'=>'777']);
        //DB::table('test')->insert(['name'=>'888']);
        //DB::table('test')->delete();
        factory(App\Article::class,5)->create();
    }
}
