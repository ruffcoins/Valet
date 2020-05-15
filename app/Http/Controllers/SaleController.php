<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Service;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('adminlte.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $customers = Customer::all();
        return view('adminlte.sales.create', compact('services', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customers' => 'required',
            'services' => 'required',
            'washer' => 'required',
            'date' => 'required',
            'total' => 'required',
            
        ]);
        
        //Check if the input value in the car reg no field and service field can be found in the 
        //customer and services tables respectively. if they are not found, then they would throw
        //an error. 
        $customerCheck = Customer::where('car_reg_no', Input::get('customers'))->first();
        $serviceCheck = Service::where('name', Input::get('services'))->first();

        if (is_null($customerCheck)) {
            return redirect()->back()->with('error', 'Car Registeration Number Does Not Exists');
        }elseif(is_null($serviceCheck)){
            return redirect()->back()->with('error', 'Service Name Does Not Exists');
        }else{
            $sale = Sale::create([
                'customer_car_reg_no' => $request->customers,
                'service_name' => $request->services,
                'washer' => $request->washer,
                'date' => $request->date,
                'total' => $request->total
            ]);
        }
        return redirect()->back()->with('success', 'Sale Saved Successfully');

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