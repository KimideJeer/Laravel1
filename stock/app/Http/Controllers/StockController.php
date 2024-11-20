<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::all();
     
        return view('stocks.index', compact('stocks')); // -> resources/views/stocks/index.blade.php 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('stocks.create'); // -> resources/views/stocks/create.blade.php
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validation for required fields (and using some regex to validate our numeric value)
    $request->validate([
        'stock_name'=>'required',
        'ticket'=>'required',
        'value'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
    ]); 
    // Getting values from the blade template form
    $stock = new Stock([
        'stock_name' => $request->get('stock_name'),
        'ticket' => $request->get('ticket'),
        'value' => $request->get('value')
    ]);
    $stock->save();
    return redirect('/stocks')->with('success', 'Stock saved.');   // -> resources/views/stocks/index.blade.php
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('stocks.edit',['stock'=>$stock]);  // -> resources/views/stocks/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'stock_name'=>'required',
            'ticket'=>'required',
            'value'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
        ]); 
        $stock = Stock::find($id);
        // Getting values from the blade template form
        $stock->stock_name =  $request->get('stock_name');
        $stock->ticket = $request->get('ticket');
        $stock->value = $request->get('value');
        $stock->save();
    
        return redirect('/stocks'); // -> resources/views/stocks/index.blade.php
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
