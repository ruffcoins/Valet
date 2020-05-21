<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('adminlte.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('adminlte.customer.create');
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
            'car_reg_no' => 'required|unique:customers',
            'phone' => 'required',
        ]);

        if (Customer::where('car_reg_no', '=', Input::get('car_reg_no'))->exists()) {
            return redirect()->back()->with('error', 'Customer Already Exists');
        }else{
            $customer = new Customer();
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->car_reg_no = $request->car_reg_no;
            $customer->phone = $request->phone;
            $customer->save();

            return redirect()->back()->with('success', 'Customer Saved Successfully');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        $sales = Sale::where('customer_car_reg_no', $customer->car_reg_no)->orderBy('date', 'desc')->get(array('service_name', 'date', 'total'));
        
        return view('adminlte.customer.show', compact('customer', 'sales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('adminlte.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        if (Customer::where('car_reg_no', '=', Input::get('car_reg_no'))->exists()) {
            return redirect()->back()->with('error', 'Car Registeration Number Already Exists');
        }else{
            $customer->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'car_reg_no' => $request->car_reg_no
            ]);

            return redirect()->back()->with('success', 'Customer Details Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back()->with('success', 'Customer Deleted Successfully');
    }
}
