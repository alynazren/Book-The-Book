<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_categories')->insert([
            'category'=>'Examination Paper Collection',
        ]);

        DB::table('book_categories')->insert([
            'category'=>'Exercise Book',
        ]);

        DB::table('book_categories')->insert([
            'category'=>'Textbook',
        ]);
        
        DB::table('book_categories')->insert([
            'category'=>'Others',
        ]);
    }
}
