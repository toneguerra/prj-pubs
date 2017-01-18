<?php

namespace App\Model\Expense\PeriodDetail;

use Illuminate\Database\Eloquent\Model;
use App\Model\Expense\Period\ExpensePeriod;

class ExpensePeriodDetail extends Model
{

    public function period(){
        return $this->belongsTo(ExpensePeriod::class, 'expense_period_id');
    }
}
