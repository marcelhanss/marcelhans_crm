<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerControllers extends Controller
{
    public function index()
    {
        $customers = Customer::with('projects.product')->get();   
        return view('customers', compact('customers'));
    }
}
