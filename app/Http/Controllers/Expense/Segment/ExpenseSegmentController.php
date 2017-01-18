<?php

namespace App\Http\Controllers\Expense\Segment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

use App\Model\Expense\Segment\ExpenseSegment;
use App\Model\Expense\Type\ExpenseType;
use App\Model\Expense\Period\ExpensePeriod;

use App\Http\Requests\Expense\ExpenseSegmentFormRequest;


class ExpenseSegmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $segmentos = ExpenseSegment::orderBy('expense_period_id', 'asc')
            ->get()
            ->groupBy('expense_type_id');

        return view('expense.segment.index', compact(['segmentos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ExpenseType::pluck('name','id');
        $periods = ExpensePeriod::pluck('name','id');
        return view('expense.segment.create',compact(['types','periods']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseSegmentFormRequest $request)
    {
        $segment = new ExpenseSegment();
        $segment = ExpenseSegment::create($request->all());

        Session::flash('success','Operação completada com sucesso!');
        return redirect(route('expense.segment.index'));
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
}
