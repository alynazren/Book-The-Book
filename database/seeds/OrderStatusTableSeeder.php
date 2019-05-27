<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            'status'=>'Posted',
        ]);

        DB::table('order_statuses')->insert([
            'status'=>'Ordered',
        ]);

        DB::table('order_statuses')->insert([
            'status'=>'Sold',
        ]);
    }
}
