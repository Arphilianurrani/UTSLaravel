<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //isian table product
        $products = [
            //baris 1
            [
                'name' => 'Indomei',
                'price' => 2000,
                'type' => 'makanan',
                'expired_at' => '2022-05-25'
            ],

            //baris 2
            [
                'name' => 'Coca-Cola',
                'price' => 5000,
                'type' => 'minuman',
                'expired_at' => '2022-08-28'
            ]
        ];

        //di looping insert
        foreach ($products as $product) {
            //insert ke table product
            Product::create([

            'name' => $product['name'],
            'price' => $product['price'],
            'type' => $product['type'],
            'expired_at'=> $product['expired_at']

            ]);

        }
    }
}
