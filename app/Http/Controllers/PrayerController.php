<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PrayerController extends Controller
{

    public function create()
    {
        return view('prayer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role->id == '1') {
            $redirectPath = '/admin/home';
        } else if($user->role->id == '4') {
            $redirectPath = '/staff/home';
        } else if($user->role->id == '2') {
            $redirectPath = '/konferens/home';
        } else {
            $redirectPath = '/sec/home';
        }

        $prayer = Prayer::create([
            
            'date' => $request->input('date', Carbon::now()->toDateString()),
            'req' => $request->input('req'),
            'detail' => $request->input('detail'),
            'church_id' => $request->input('church_id'),
            'user_id' => $request->input('user_id')
        ]);

        return redirect($redirectPath);
    }


    public function edit(Prayer $prayer)
    {
        return view('prayer.edit', compact('prayer'));
    }

    
    public function update(Request $request, Prayer $prayer)
    {
        $user = Auth::user();
        if ($user->role->id == '1') {
            $redirectPath = '/admin/home';
        } else if($user->role->id == '4') {
            $redirectPath = '/staff/home';
        } else if($user->role->id == '2') {
            $redirectPath = '/konferens/home';
        } else {
            $redirectPath = '/sec/home';
        }

        $prayer = Prayer::whereId($prayer->id)->update([
            'req' => $request->input('req'),
            'date' => $request->input('date'),
            'detail' => $request->input('detail'),
            'church_id' => $request->input('church_id'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect($redirectPath);
    }

   
    public function destroy(Prayer $prayer)
    {
        $user = Auth::user();
        if ($user->role->id == '1') {
            $redirectPath = '/admin/home';
        } else if($user->role->id == '4') {
            $redirectPath = '/staff/home';
        } else if($user->role->id == '2') {
            $redirectPath = '/konferens/home';
        } else {
            $redirectPath = '/sec/home';
        }

        $prayer = Prayer::find($prayer->id);
        $prayer->delete();

        return redirect($redirectPath);
    }
}
