<?php

namespace App\Http\Controllers;

use App\Models\Customer; 
use Illuminate\Http\Request;

class CustomerController extends Controller

{
    public function index()
    {
        $customers = Customer::orderby('created_at', 'DESC')->get();
        return view('customerindex', compact('customers'));
    }

    public function create()
    {
        return view(view: 'customercreate');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        //Validation
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:50|unique:customers'
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone_no = $request->phone_no;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('customer');
    }

    public function edit($id)
    {
        // Find the customer by ID
        $customer = Customer::findOrFail($id);
    
        // Pass the customer data to the view
        return view('customeredit', compact('customer'));
    }



    public function update(Request $request, $id)
    {
    // Validate the incoming data
    $validatedData = $request->validate([
        'name' => 'required|min:2|max:50|unique:customers,name,' . $id,
        'phone_no' => 'required',
        'address' => 'required',
    ]);

    // Find the customer and update their information
    $customer = Customer::findOrFail($id);
    $customer->name = $request->name;
    $customer->phone_no = $request->phone_no;
    $customer->address = $request->address;
    $customer->save();

    return redirect()->route('customer');
}



public function destroy($id)
{
    $customer = Customer::findOrFail($id);
    $customer->delete();

    return redirect()->route('customer')->with('success', 'Customer deleted successfully!');
}

}
