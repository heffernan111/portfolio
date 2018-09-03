<?php

use Illuminate\Database\Seeder;

class CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = i;
        while (i <= 10) {
            i++;
            DB::table('codes')->insert([
            'title' => str_random(10),
            'description' => str_random(10),
            'thumbnail' => 'php-hello-world-source.png',
        ]);
        }
        
    }
}
