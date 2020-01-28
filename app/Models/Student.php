<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Student extends Model
{	

	use Sortable;
	
    // Mass Assignment
    protected $fillable = [
        'first_name', 'last_name', 'dob', 'gender','email', 'phone', 'address', 'zipcode'
    ];

    // sortable Assignment
    protected $sortable = [
        'first_name', 'last_name', 'dob', 'gender','email', 'phone', 'address', 'zipcode'
    ];
}
