<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $status = [
            ['name'=>'Active'],
            ['name'=>'Inactive'],
            ['name'=>'Pending'],
            ['name'=>'Not Available'],
            ['name'=>'Expired'],
            ['name'=>'Deleted']
        ];

		Status::insert($status); 

		/* Note:- use Model::insert when multiple rows items inserted */
    }
}
