<?php
namespace App\Model\Expense\Segment;

use Illuminate\Database\Eloquent\Model;

use App\Model\Expense\Period\ExpensePeriod;
use App\Model\Expense\Type\ExpenseType;


class ExpenseSegment extends Model
{

    protected $fillable=['name','abrev', 'expense_type_id', 'expense_period_id'];


    public function period(){
        return $this->belongsTo(ExpensePeriod::class, 'expense_period_id');
    }

    public function type(){
        return $this->belongsTo(ExpenseType::class,'expense_type_id');
    }
}