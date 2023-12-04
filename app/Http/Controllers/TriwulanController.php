<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Triwulan;

class TriwulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $triwulan = Triwulan::get();
        return view('triwulan.create', compact('triwulan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $triwulan = Triwulan::create([
            'triwulan' => $request->input('triwulan'),
            'year' => $request->input('year'),
        ]);
        return redirect('/triwulan/create');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
