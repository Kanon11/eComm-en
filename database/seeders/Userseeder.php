<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $objDB=new DB();
        DB::table('user')->insert(['name'=>'mukti','email'=>'muktinsrc11@gmail.com','password'=>Hash::make("abc@123")]);
    }
}
