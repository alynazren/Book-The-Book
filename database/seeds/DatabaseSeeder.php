<?php

// use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BookCategoriesTableSeeder::class);
        $this->command->info('BookCategoriesTableSeeder table seeded!');

        $this->call(BookSubjectsTableSeeder::class);
        $this->command->info('BookSubjectsTableSeeder table seeded!');

        $this->call(OrderStatusTableSeeder::class);
        $this->command->info('OrderStatusTableSeeder table seeded!');

        
    }
}
