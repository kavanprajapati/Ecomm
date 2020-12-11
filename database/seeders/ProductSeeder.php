<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                "name"=>"oppo Mobile",
                "price"=>"15000",
                "category"=>"mobile",
                "description"=>"A smartphone with 8 GB RAM and with much more feautures",
                "gallery"=>"https://image.oppo.com/content/dam/oppo/in/mkt/smartphone/product-list/F15%20300x300-2x.png"
            ],
            [
                "name"=>"Samsung TV",
                "price"=>"40000",
                "category"=>"television",
                "description"=>"A TV with 4K screen and having android functionality and full HD",
                "gallery"=>"https://cdn.shopify.com/s/files/1/2660/5202/products/am1b6aqoaovlr9feumj5_1400x.jpg?v=1571710395"
            ]
        ]);        
    }
}
