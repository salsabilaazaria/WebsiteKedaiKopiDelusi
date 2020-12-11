<?php

use Illuminate\Database\Seeder;

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
    'category_id'=>1,
    'name'=>'Espresso',
    'description'=>'Pure Coffee',
    'price'=>15000,
    'image'=>'espresso.jpg'
    ],
    [
    'category_id'=>1,
    'name'=>'Vietnamese Drip',
    'description'=>'Condensed Milk + Coffee',
    'price'=>15000,
    'image'=>'vietnamese.jpg'
    ],
    [
    'category_id'=>1,
    'name'=>'Americano',
    'description'=>'Espresso + Water',
    'price'=>15000,
    'image'=>'americano.jpg'
    ],
    [
    'category_id'=>1,
    'name'=>'Kopi Susu Delusi',
    'description'=>'Fresh Milk + Coffee + Palm Sugar',
    'price'=>15000,
    'image'=>'kopisusudelusi.jpg'
    ],
    [
    'category_id'=>1,
    'name'=>'Coffee Latte',
    'description'=>'Fresh Milk + Espresso',
    'price'=>15000,
    'image'=>'latte.jpg'
    ],
    [
    'category_id'=>1,
    'name'=>'Green Tea Latte Fusion',
    'description'=>'Green Tea + Fresh Milk + Espresso',
    'price'=>150000,
    'image'=>'greentealattefusion.jpg'
    ],

    [
    'category_id'=>2,
    'name'=>'Green Tea Latte',
    'description'=>'Green Tea + Milk',
    'price'=>15000,
    'image'=>'greentealatte.jpg'
    ],
    [
    'category_id'=>2,
    'name'=>'Susu Regal',
    'description'=>'Regal Biscuit + Milk',
    'price'=>15000,
    'image'=>'susuregal.jpg'
    ],
    [
    'category_id'=>2,
    'name'=>'Delusi Coffee Beer',
    'description'=>'Nitro Coffee',
    'price'=>15000,
    'image'=>'coffeebeer.jpg'
    ],
    [
    'category_id'=>2,
    'name'=>'Mango Squash',
    'description'=>'Mango Syrup + Soda',
    'price'=>15000,
    'image'=>'mangosquash.jpg'
    ],
    [
    'category_id'=>2,
    'name'=>'Orange Squash',
    'description'=>'Orange Syrup + Soda',
    'price'=>15000,
    'image'=>'orangesquash.jpg'
    ],
    [
    'category_id'=>2,
    'name'=>'Lychee Squash',
    'description'=>'Lychee Syrup + Soda',
    'price'=>15000,
    'image'=>'lycheesquash.jpg'
    ] ]);
    }
}