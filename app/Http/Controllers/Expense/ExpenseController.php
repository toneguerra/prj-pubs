<?php

namespace App\Http\Controllers\Expense;

//use Illuminate\Auth\Access\Response;
use App\Http\Requests\Expense\ExpenseFormRequest;
use App\Http\Requests\Expense\ExpenseSegmentFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Response;

use App\Model\Year\Year;
use App\Model\Expense\Segment\ExpenseSegment;
use App\Model\Expense\PeriodDetail\ExpensePeriodDetail;
use Mockery\Matcher\Type;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$periodDetails = ExpensePeriodDetail::find(1);
      //dd($periodDetails);
      //return view('expense.index',compact(['periodDetails']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = Year::pluck('year','id');
        $segments = ExpenseSegment::pluck('name','id');
        $periodDetails = ExpensePeriodDetail::pluck('name','id');

        return view('expense.create', compact(['years','segments','periodDetails']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseFormRequest $request)
    {
        echo '<pre>'. $request . '</pre>';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filtro(Request $request)
    {
       $id = $request->input('expense_segment');
       $myret = ExpenseSegment::find($id);

        $periodo = $myret->expense_period_id;
        
        $periodoDetail = ExpensePeriodDetail::all()->where('expense_period_id','=', $periodo);


        $x = $periodoDetail->count();

        If ($x > 0){
            return Response::json($periodoDetail);
        }else{
            return Response::json($x);
        }

    }
}
