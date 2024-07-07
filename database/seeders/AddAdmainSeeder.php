<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddAdmainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "name"=> "admin",
            "email"=> "admin@example.com",
            "password"=> 122,
            "status"=> "admin",
        ]);
        $admin->assignRole("admin");
    }
}
