<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'first_name' => 'Super',
            'last_name'  => 'Admin',
            'email'      => 'sushil.kumar@kiwitech.com',
            'password'   => bcrypt('Admin@123')
        ]);
    }
}
