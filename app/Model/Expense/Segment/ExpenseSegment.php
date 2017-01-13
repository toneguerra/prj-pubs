<?php
namespace App\Model\Expense\Segment;

use Illuminate\Database\Eloquent\Model;

use App\Model\Expense\Period\ExpensePeriod;
use App\Model\Expense\Type\ExpenseType;


class ExpenseSegment extends Model
{

    protected $fillable=['name','abrev', 'expense_type_id', 'expense_period_id'];

/*
    public function period(){
        $this->hasOne(ExpensePeriod);
    }
*/
    public function type(){
        $this->hasOne(ExpenseType::class);
    }
}