<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Ukssmem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $member = Member::orderBy('name')->where('church_id', $user->church_id)->get();
        return view('member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member = Member::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'church_id' => $request->input('church_id')
        ]);

        return redirect('/member');
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
    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $member = Member::whereId($member->id)->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender')
        ]);

        return redirect('/member');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member = Member::find($member->id);

        if ($member) {
            $ukssmem = Ukssmem::where('member_id', $member->id)->get();

            foreach ($ukssmem as $um) {
                $um->delete();
            }
            
            $member->delete();
        }
       

        return redirect('/member');
    }
}
