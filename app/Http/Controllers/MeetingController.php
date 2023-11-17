<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Triwulan;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meeting = Meeting::latest()->get();
        return view('attendance.date', compact('meeting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $triwulan = Triwulan::get();
        return view('meeting.create', compact('triwulan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meeting = Meeting::create([
            'triwulan_id' => $request->input('triwulan_id'),
            'date' => $request->input('date'),
        ]);

        return redirect('/meeting/create');
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
