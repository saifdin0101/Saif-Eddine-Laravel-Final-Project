<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            [
                "name" => "saifdin",
                "role" => "admin",
                "image"=> "https://pbs.twimg.com/media/FLOdCblWUAEPFMI.jpg",
                "email"=>"saifdin@gmail.com",
                "password"=>bcrypt("saif1234")
            ],
            

        ]);
    }
}
