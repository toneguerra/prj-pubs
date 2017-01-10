<?php

namespace App\Http\Controllers\Expense\Period;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Expense\Period\ExpensePeriod;

class ExpensePeriodController extends Controller
{
    public function index()
    {
    	$periodos = ExpensePeriod::all();
      return view('expense.period.index',compact(['periodos']));
    }
}
