<?php

namespace App\Model\Expense;

use Illuminate\Database\Eloquent\Model;


class Expense extends Model
{

    protected $fillable = [
        'id',
        'year_id',
        'expense_segment_id',
        'expense_period_detail_id',
        'path'
    ];


}
