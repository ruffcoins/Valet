<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['first_name', 'last_name', 'car_reg_no', 'phone'];
}
