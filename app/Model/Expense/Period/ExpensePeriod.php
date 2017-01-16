<?php
namespace App\Model\Expense\Period;

use Illuminate\Database\Eloquent\Model;

use App\Model\Expense\Segment\ExpenseSegment;

class ExpensePeriod extends Model
{

    public function segments(){
        return $this->hasMany(ExpenseSegment::class);
    }

}