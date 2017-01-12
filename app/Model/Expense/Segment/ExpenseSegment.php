<?php
namespace App\Model\Expense\Segment;

use Illuminate\Database\Eloquent\Model;

class ExpenseSegment extends Model
{

    public $rules = ['name'=>'required'];

}