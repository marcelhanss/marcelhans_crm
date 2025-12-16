<?php

namespace App\Http\Controllers;
use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadControllers extends Controller
{
     public function index()
    {
        $leads = Lead::with('user')->get();
        $products = Product::all();
        return view('leads', compact('leads', 'products'));
    }

     public function create()
    {
        return view('leadsCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'nullable|email',
        ]);

        Lead::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Lead berhasil dibuat');
    }
}
