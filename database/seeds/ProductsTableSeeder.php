<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = database_path('seeds/csv/products.csv');
        $excel = App::make('excel');

        $data = $excel->load($csv, function($reader) {
            $results = $reader->all();
            foreach($results as $row) {
                DB::table('products')->insert([
                    'name' => $row->name,
                    'price' => $row->price,
                    'desc' => $row->desc,
                    'status' => $row->status,
                    'qty' => $row->qty,
                    'total' => $row->total,
                    'category_id' => $row->category_id,
                    'seller_id' => $row->seller_id
                ]);
            }
        });
    }
}
