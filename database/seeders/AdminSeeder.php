<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Nayan Malakar',
            'email' => '190128.cse@student.just.edu.bd',
            'password' => bcrypt('n@y@n190128')
        ];
        Admin::create($admin);
    }
}
