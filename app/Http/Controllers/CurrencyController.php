<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('currency.index')->with(['currencies' => Currency::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('currency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedCurrency = $request->validate([
            'name' => 'required',
            'code' => 'required|size:3',
        ]);

        $currency = Currency::create($validatedCurrency);

        Session::flash('success', 'La devise ' . $currency->name . " a été créée");

        return redirect()->route('currency.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        return view('currency.update')->with(['currency' => $currency]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        $validatedCurrency = $request->validate([
            'name' => 'required',
            'code' => 'required|size:3',
        ]);

        $currency->update($validatedCurrency);
        Session::flash('success', 'La devise ' . $currency->name . " a été mise à jour");


        return redirect()->route('currency.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        Session::flash('success', 'La devise ' . $currency->name . " a été supprimée");

        return redirect()->route('currency.index');
    }
}
