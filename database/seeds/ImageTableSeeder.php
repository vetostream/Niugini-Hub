<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 501; $i++) { 
            factory(App\Images::class, 3)->create([
                'product_id' => $i,
            ]);
       }
    }
}
