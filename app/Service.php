<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'price'];

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }
}
