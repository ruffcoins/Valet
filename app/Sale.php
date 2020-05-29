<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

}
