<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'name' => 'basic',
            'description' => 'The "basic" plan allows you to create 1 saas product'
        ]);

        DB::table('plans')->insert([
            'name' => 'plus',
            'description' => 'The "plus" plan allows you to create 5 saas products with help from top developers'
        ]);

        DB::table('plans')->insert([
            'name' => 'pro',
            'description' => 'The "pro" plan allows you to create 10 saas product with help from top developers and no worries, we deal with the problems'
        ]);
    }
}
