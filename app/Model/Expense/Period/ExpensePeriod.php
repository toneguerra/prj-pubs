<?php
namespace App\Model\Expense\Period;

use Illuminate\Database\Eloquent\Model;

use App\Model\Expense\Segment\ExpenseSegment;
use App\Model\Expense\PeriodDetail\ExpensePeriodDetail;

class ExpensePeriod extends Model
{

    //MODEL ExpenseSegment
    public function segments(){
        return $this->hasMany(ExpenseSegment::class);
    }


    //MODEL ExpensePeriodDetails
    public function periodDetails(){
        return $this->hasMany(ExpensePeriodDetail::class);
    }

}