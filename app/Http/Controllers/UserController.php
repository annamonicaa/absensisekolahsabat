<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Church;
use App\Models\Role;
use App\Models\Ukss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $test = Auth::user();
        if (Auth::user()->role_id == 2) {
            $user = User::orderBy('username')->where('ukss_id', $ukss_id = 0)->get();
        } else {
            $user = User::orderBy('username')->where('church_id', $test->church_id)->get();
        }
        return view('user.index', compact('user'));
    }

    // public function index2()
    // {     
    //     $user = User::orderBy('username')->get();
    //     return view('user.index2', compact('user'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $church = Church::get();
        $user = Auth::user();
        if (Auth::user()->role_id == 4) {
            $ukss = Ukss::where('church_id', $user->church_id)->get();
        } else {
            $ukss = Ukss::get();
        }
        
        
        $role = Role::get();
        

        $user = Auth::user();
        if ($user->role->id == '1') {
            $redirectPath = 'user.create1';
        } else if ($user->role->id == '2') {
            $redirectPath = 'user.create2';
        } else {
            $redirectPath = 'user.create';
        }

        return view($redirectPath, compact('church', 'role', 'ukss'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'name' => $request->input('name'),
            'role_id' => $request->input('role_id'),
            'church_id' => $request->input('church_id'),
            'ukss_id' => $request->input('ukss_id')
            // 'church_id' => Auth::user()->church_id
            
        ]);

        return redirect('/user');
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
    public function edit(User $user)
    {
        $role = Role::get();
        $ukss = Ukss::get();
        return view('user.edit', compact('user', 'role', 'ukss'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = User::whereId($user->id)->update([
            'username' => $request->input('username'),
            // 'password' => Hash::make($request->input('password')),
            'password' => $request->input('password') ? Hash::make($request->input('password')) : User::whereId($user->id)->value('password'),
            'role_id' => $request->input('role_id'),
            'church_id' => $request->input('church_id'),
            'ukss_id' => $request->input('ukss_id')
        ]);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function password() {
        return view('changePassword');
    } 

    public function changePassword() {
        
    }

    public function destroy(User $user)
    {
        $user = User::find($user->id);
        $user->delete();

        return redirect('/user');
    }
}
