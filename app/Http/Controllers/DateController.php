<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function index()
    {
        $date = Date::latest()->get();
        return view('date.index', compact('date'));
    }
}
