<?php

namespace App\Model\Expense\Type;

use Illuminate\Database\Eloquent\Model;

use App\Model\Expense\Segment\ExpenseSegment;

class ExpenseType extends Model
{
    public function segments(){
        $this->belongsTo(ExpenseSegment::class);
    }
}
