<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('book_subjects')->insert([
            'subject'=>'Allied Health Science',
        ]);
        
        DB::table('book_subjects')->insert([
            'subject'=>'Architecture',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Computer Science',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Dentistry',
        ]);
        
        DB::table('book_subjects')->insert([
            'subject'=>'Economics',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Education',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Engineering',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Environmental Design',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Human Sciences',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Information Technology',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Islamic Revealed Knowledge',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Languages',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Laws',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Management',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Management Sciences',
        ]);        

        DB::table('book_subjects')->insert([
            'subject'=>'Medicine',
        ]);     
        
        DB::table('book_subjects')->insert([
            'subject'=>'Nursing',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Pharmacy',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Science',
        ]);

        DB::table('book_subjects')->insert([
            'subject'=>'Others',
        ]);
    }
}
