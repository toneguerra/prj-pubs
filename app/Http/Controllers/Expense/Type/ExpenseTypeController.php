<?php

namespace App\Http\Controllers\Expense\Type;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Expense\Type\ExpenseType;

class ExpenseTypeController extends Controller
{
    public function index()
    {
    	$tipos = ExpenseType::all();
      return view('expense.type.index',compact(['tipos']));
    }
}
