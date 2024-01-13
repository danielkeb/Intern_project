<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       DB::table('users')->insert([
        [
        'userid'=>'00438',
        'name'=>'Admin',
        'email'=>'Admin1234@gmail.com',
        'phone'=>'09532626',
        'address'=>'adama',
        'password'=>Hash::make('12345678'),
        'usertype'=>'1',],
       ]);
    }
}
