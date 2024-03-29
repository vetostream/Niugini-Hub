<?php

use Illuminate\Database\Seeder;
use App\Products as Products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Products::class, 500)->create();
    }
}
