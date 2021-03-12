<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \DB::table('products')->insert([
           'type' => 'cd',
           'firstname' => 'Антонио',
            'mainname'=> 'Вивальди',
            'title'=> 'Классическая музыка. Лучшее',
            'discount'=>12,
            'price' => 10.99,
            'playlength' => '01:02:03'
        ]);
        \DB::table('products')->insert([
            'type' => 'book',
            'firstname' => 'Михаил',
            'mainname'=> 'Булгаков',
            'title'=> 'Собачье сердце',
            'discount'=>1,
            'price' => 5.99,
            'numpages'=>745
        ]);
    }
}
