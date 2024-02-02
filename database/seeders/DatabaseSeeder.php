Data<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Dummy Administrator
            Admin::create(array('fullname' => 'Administrator', 'username' => 'admin', 'type' => '1', 'designation' => 'Super Admin', 'password' => bcrypt('Data@123'), 'is_active' => '1', 'created_by' => '0'));
    }
}
