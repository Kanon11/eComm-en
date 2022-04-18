<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_seeder extends Seeder
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
                "name" => "Samsung Fridge", "price" => "20000",
                "category" => "fridge", "description" => "non foster fridge",
                "gallery" => "https://www.electrabd.com/wp-content/uploads/2020/12/RT-37-K55-S8-2.png"
            ],
            [
                "name" => "Huawei Fridge", "price" => "20000",
                "category" => "fridge", "description" => "non foster fridge",
                 "gallery" => "https://static-01.daraz.com.bd/p/32d6cd525acc9809104a93231e8f1b6e.jpg"
            ],            [
                "name" => "LG Fridge", "price" => "20000",
                "category" => "fridge", "description" => "non foster fridge",
                 "gallery" => "https://img.us.news.samsung.com/us/wp-content/uploads/2018/01/14112220/180108_FH_AKG-Speaker_Full-Shot_w_homescreen_rgb_04.jpg"
            ]
        ]);
    }
}
