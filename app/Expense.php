<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'expense_name', 'expense_cost', 'expense_purpose', 'expense_date'
    ];
}
