<?php

namespace App\Http\Controllers\Expense;


use App\Http\Requests\Expense\ExpenseFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

use App\Model\Expense\Expense;
use App\Model\Year\Year;
use App\Model\Expense\Segment\ExpenseSegment;
use App\Model\Expense\PeriodDetail\ExpensePeriodDetail;



class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relat = Expense::all();

        return view('expense.index',compact(['relat']));
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

        //dd($request->all());
        $year_id = Year::findOrfail($request->year_id);
        $year = $year_id->year;

        $segment = ExpenseSegment::findOrfail($request->expense_segment_id);
        $typAbrev = $segment->type->abrev;
        $segAbrev = $segment->abrev;

        $periodD_id = ExpensePeriodDetail::findOrfail($request->expense_period_detail_id);
        $perAbrev = $periodD_id->abrev;

        $fileName = $year.$typAbrev.$segAbrev.$perAbrev;
        $path = 'pubs/'.$year.'/contaspublicas/'.$segAbrev;



        if ($request->hasFile('path')) {
            $fileName = $fileName.'.'.$request->path->getClientOriginalExtension();
            $request->path->move(public_path($path),$fileName);

            $segment = new Expense();
            $segment = Expense::create(
                [
                    'year_id' => $request->year_id,
                    'expense_segment_id' => $request->expense_segment_id,
                    'expense_period_detail_id' => $request->expense_period_detail_id,
                    'path' => $path.'/'.$fileName
                ]
            );


            Session::flash('success','Operação completada com sucesso!');

            return redirect(route('expense.index'));

        }




        //echo '<pre>'. $request . '</pre>';
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
