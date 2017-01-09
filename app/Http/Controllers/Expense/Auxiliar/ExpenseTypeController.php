<?php

namespace App\Http\Controllers\Expense\Auxiliar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Expense\Auxiliar\ExpenseType;

class ExpenseTypeController extends Controller
{
    public function index()
    {
    	$tipos = ExpenseType::all();
      return view('expense.auxiliar.index',compact(['tipos']));
    }
}
