<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\Ukss;
use App\Models\Triwulan;
use App\Models\Ukssmem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UkssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $ukss = Ukss::orderBy('name')->where('church_id', $user->church_id)->get();
        return view('ukss.index', compact('ukss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $church = Church::get();
        $triwulan = Triwulan::latest()->get();
        $user = Auth::user();
        if ($user->role->id == '1') {
            $redirectPath = 'ukss.create1';
        } else {
            $redirectPath = 'ukss.create';
        }
        return view($redirectPath, compact('church', 'triwulan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ukss = Ukss::create([
            'church_id' => $request->input('church_id'),
            'name' => $request->input('name'),
            'leader' => $request->input('leader'),
            'secretary' => $request->input('secretary'),
            'loc' => $request->input('loc'),
            'triwulan_id' => $request->input('triwulan_id')
        ]);
        return redirect('/ukss');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ukss $ukss)
    {
        $church = Church::get();
        $triwulan = Triwulan::get();
        return view('ukss.edit', compact('ukss', 'church', 'triwulan'));
    }

    public function update(Request $request, Ukss $ukss)
    {
        $ukss = Ukss::whereId($ukss->id)->update([
            'church_id' => $request->input('church_id'),
            'leader' => $request->input('leader'),
            'secretary' => $request->input('secretary'),
            'loc' => $request->input('loc')
        ]);
        return redirect('/ukss');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ukss $ukss)
    {
        $ukss = Ukss::find($ukss->id);

        if ($ukss) {
            $ukssmem = Ukssmem::where('ukss_id', $ukss->id)->get();
            $user = User::where('ukss_id', $ukss->id)->get();

            foreach ($ukssmem as $um) {
                $um->delete();
            }

            foreach ($user as $u) {
                $u->delete();
            }

            $ukss->delete();

        }
        return redirect('/ukss');
    }
}
