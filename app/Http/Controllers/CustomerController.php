<?php

namespace App\Http\Controllers;

use App\Models\Customer; // Import the Customer model
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        // Remove or comment out the dd() statement once you confirm data is being fetched
        // dd($customers->toArray());
        return view('customerindex', compact('customers'));
    }
}
