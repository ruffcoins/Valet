<?php

namespace App\Http\Controllers;

use App\Sale;
use App\User;
use App\Service;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function index(User $user, Service $service, Sale $sale, Customer $customer)
    {
        $users = $user->all();
        $userCount = $users->count();

        $services = $service->all();
        $serviceCount = $services->count();

        $sales = $sale->all();
        $saleCount = $sales->count();

        $customers = $customer->all();
        $customerCount = $customers->count();
        
        return view('adminlte.home', \compact('userCount', 'serviceCount', 'saleCount', 'customerCount'));
    }
}
