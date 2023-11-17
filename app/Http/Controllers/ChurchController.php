<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\Ukss;
use App\Models\Ukssmem;
use App\Models\Member;
use App\Models\Prayer;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $church = Church::oldest()->get();
        return view('church.index', compact('church'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('church.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $church = Church::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'pastor' => $request->input('pastor'),
            'leader' => $request->input('leader')
        ]);

        return redirect('/church');
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
    public function edit(Church $church)
    {
        return view('church.edit', compact('church'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Church $church)
    {
        $church = Church::whereId($church->id)->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'pastor' => $request->input('pastor'),
            'leader' => $request->input('leader')
        ]);

        return redirect('/church');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Church $church)
    {
        $church = Church::find($church->id);

        if ($church) {
            $ukss = Ukss::where('church_id', $church->id)->get();
            $ukssmem = Ukssmem::where('church_id', $church->id)->get();
            $member = Member::where('church_id', $church->id)->get();
            $prayer = Prayer::where('church_id', $church->id)->get();
            $user = User::where('church_id', $church->id)->get();

    
            foreach ($ukss as $u) {
                $u->delete();
            }
            
            foreach ($ukssmem as $um) {
                $um->delete();
            }

            foreach ($member as $m) {
                $m->delete();
            }

            foreach ($prayer as $p) {
                $p->delete();
            }

            foreach ($user as $u) {
                $u->delete();
            }
            
            $church->delete();
        }


        return redirect('/church');
    }

    public function coba()
    {
        return view('church.cobaaja');
    }
}
