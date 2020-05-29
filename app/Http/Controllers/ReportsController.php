<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use PDF;
use App\Sale;
use App\Expense;
use App\Customer;
use App\Service;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function customers(Customer $customer)
    {
        $grandTotal = 0;
        $totalTransactions = 0;

        $customers = $customer->all();

        foreach ($customers as $customer) {
            $grandTotal += $customer->total_amount;
            $totalTransactions += $customer->transaction_count;
        }

        return view('adminlte.reports.customers', ['data' => $customers, 'grandTotal' => $grandTotal, 'totalTransactions' => $totalTransactions]);
    }

    public function customerReportDownload(Customer $customer)
    {
        $grandTotal = 0;
        $totalTransactions = 0;

        $customers = $customer->all();
        foreach($customers as $customer) {
            $grandTotal += $customer->total_amount;
            $totalTransactions += $customer->transaction_count;
        }

        $pdf = PDF::loadView('adminlte.reports.customerReport', compact('customers', 'grandTotal', 'totalTransactions'));
        return $pdf->download('CustomerReport.pdf');
    }

    public function sales(Sale $sale)
    {
        $grandTotal = 0;
        $sales = Sale::with(['service', 'customer'])->paginate(10);

        if($sales->currentpage() == $sales->lastpage()){
            View::share('grandTotal', $sale->sum('total'));
        }

        return view('adminlte.reports.sales', ['data' => $sales]);
    }

    public function saleReportDownload(Sale $sale)
    {
        $grandTotal = 0;

        $sales = Sale::with(['service', 'customer'])->get();

        foreach($sales as $sale)
        {
            $grandTotal += $sale->total;
        }
        $pdf = PDF::loadView('adminlte.reports.saleReport', compact('sales', 'grandTotal'));
        return $pdf->download('SalesReport.pdf');
    }

    public function expenses(Expense $expense)
    {
        $grandTotal = 0;
        $expenses = $expense->all();

        foreach($expenses as $expense)
        {
            $grandTotal += $expense->expense_cost;
        }
        return view('adminlte.reports.expenses', compact('expenses', 'grandTotal'));
    }

    public function expenseReportDownload(Expense $expense)
    {
        $grandTotal = 0;
        $expenses = $expense->all();

        foreach($expenses as $expense)
        {
            $grandTotal += $expense->expense_cost;
        }
        $pdf = PDF::loadView('adminlte.reports.expenseReport', compact('expenses', 'grandTotal'));
        return $pdf->download('ExpenseReport.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
