<?php

namespace App\Http\Controllers;

use App\Sale;
use App\User;
use App\Expense;
use App\Service;
use App\Customer;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Charts\SalesChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user, Service $service, Sale $sale, Customer $customer, Expense $expense)
    {
        //dashboard top strip
        $users = $user->all();
        $userCount = $users->count();

        $services = $service->all();
        $serviceCount = $services->count();

        $sales = $sale->all();
        $saleCount = $sales->count();

        $customers = $customer->all();
        $customerCount = $customers->count();


        //dashboard bottom strip
        $saleGrandTotal = 0;
        foreach($sales as $sale){
            $saleGrandTotal += $sale->total;
        }

        $expenses = $expense->all();
        $expenseGrandTotal = 0;

        foreach($expenses as $expense){
            $expenseGrandTotal += $expense->expense_cost;
        }

        $profit = 0;
        $profitPercentage = 0;

        $profit = $saleGrandTotal - $expenseGrandTotal;

        if($saleGrandTotal > 0){
            $profitPercentage = ($profit/$saleGrandTotal) * 100;
            $profitPercentage = round($profitPercentage);
        }

        $formattedProfit = number_format($profit);
        $formattedSaleGrandTotal = number_format($saleGrandTotal);
        $formattedExpenseGrandTotal = number_format($expenseGrandTotal);

        //This section is for the charts
        //THIS WEEK
        //get all the dates from today going back one week or seven days
        $now = carbon::now();
        $oneWeekAgo = carbon::now()->subDays(7);
        $thisWeek = CarbonPeriod::create($oneWeekAgo, $now);
        foreach ($thisWeek as $thisWeekDate) {
            $thisWeekDates[] = $thisWeekDate->format('Y-m-d');
        }


        //sum the total amount spent of each sale made on each day this week
        //if there are 5 sales on a particular day, it adds all 5 sales
        foreach ($thisWeekDates as $thisWeekDate) {
            $thisWeekTotalByDate[] = $sale->orderBy('date')->where('date', $thisWeekDate)->sum('total');
        }

        //Get total sales for this week
        $thisWeekTotalSales = 0;

        foreach($thisWeekTotalByDate as $totalSale){

            $thisWeekTotalSales += $totalSale;
        }


        //sum the total amount spent of each expense made on each day this week
        //if there are 5 expenses on a particular day, it adds all 5 expenses
        foreach ($thisWeekDates as $thisWeekDate) {
            $thisWeekExpenseByDate[] = $expense->orderBy('expense_date')->where('expense_date', $thisWeekDate)->sum('expense_cost');
        }

        //Get total expenses for this week
        $thisWeekTotalExpenses = 0;

        foreach($thisWeekExpenseByDate as $totalExpense){

            $thisWeekTotalExpenses += $totalExpense;
        }


        //LAST WEEK
        //get all the dates from a week ago going back another week (ie ### Two weeks ago ###)
        $twoWeeksAgo = Carbon::now()->subDays(14);
        $lastWeek = CarbonPeriod::create($twoWeeksAgo, $oneWeekAgo);
        foreach ($lastWeek as $lastWeekDate) {
            $lastWeekDates[] = $lastWeekDate->format('Y-m-d');
        }


        //sum the total amount spent of each sale made on each day last week
        //if there are 5 sales on a particular day, it adds all 5 sales
        foreach ($lastWeekDates as $lastWeekDate) {
            $lastWeekTotalByDate[] = $sale->orderBy('date')->where('date', $lastWeekDate) ->sum('total');
        }

        //Get total sales for last week
        $lastWeekTotalSales = 0;

        foreach($lastWeekTotalByDate as $totalSale){

            $lastWeekTotalSales += $totalSale;
        }

        //sum the total amount spent of each expense made on each day last week
        //if there are 5 expenses on a particular day, it adds all 5 expenses
        foreach ($lastWeekDates as $lastWeekDate) {
            $lastWeekExpenseByDate[] = $expense->orderBy('expense_date')->where('expense_date', $lastWeekDate) ->sum('expense_cost');
        }

        //Get total expenses for last week
        $lastWeekTotalExpenses = 0;

        foreach($lastWeekExpenseByDate as $totalExpense){

            $lastWeekTotalExpenses += $totalExpense;
        }


        $thisWeekProfit = $thisWeekTotalSales - $thisWeekTotalExpenses;
        $lastWeekProfit = $lastWeekTotalSales - $lastWeekTotalExpenses;

        if ($lastWeekProfit == 0){
            $weeklyGrowthPercentage = $thisWeekProfit;
        }elseif ($thisWeekProfit == 0){
            $weeklyGrowthPercentage = 0;
        }else{
            $weeklyGrowthPercentage = round((($thisWeekProfit - $lastWeekProfit) / $lastWeekProfit) * 100);
        }

        //Create Sales Chart
        $salesChart = new SalesChart;
        $salesChart->labels($thisWeekDates);
        $salesChart->dataset('This Week', 'line', $thisWeekTotalByDate)->options([
            'backgroundColor' => 'rgba(12,123,255)',
            'borderColor' => 'rgba(12,123,255)',
            'fill' => false,
            'responsive' => true
        ]);
        $salesChart->dataset('Last Week', 'line', $lastWeekTotalByDate)->options([
            'backgroundColor' => 'rgba(168,168,168)',
            'borderColor' => 'rgba(168,168,168)',
            'fill' => false,
        ]);


        //Create Expense chart
        $expenseChart = new SalesChart;
        $expenseChart->labels($thisWeekDates);
        $expenseChart->dataset('This Week', 'line', $thisWeekExpenseByDate)->options([
            'backgroundColor' => 'rgba(12,123,255)',
            'borderColor' => 'rgba(12,123,255)',
            'fill' => false,
            'responsive' => true
        ]);
        $expenseChart->dataset('Last Week', 'line', $lastWeekExpenseByDate)->options([
            'backgroundColor' => 'rgba(168,168,168)',
            'borderColor' => 'rgba(168,168,168)',
            'fill' => false,
        ]);


        return view('adminlte.home', compact('userCount', 'serviceCount', 'saleCount', 'customerCount', 'formattedSaleGrandTotal', 'formattedExpenseGrandTotal', 'formattedProfit', 'salesChart', 'expenseChart', 'profitPercentage', 'weeklyGrowthPercentage'));
    }
}
