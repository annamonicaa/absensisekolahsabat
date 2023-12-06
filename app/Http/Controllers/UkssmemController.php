<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Ukss;
use App\Models\Triwulan;
use App\Models\Ukssmem;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UkssmemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // $ukss = Ukss::orderBy('name')->get();
        // $ukssmem = Ukssmem::where('church_id', $user->church_id)->selectRaw('MIN(id) as id, ukss_id')
        //         ->groupBy('ukss_id')
        //         ->get();
        $ukssmem = Ukssmem::get();
        $ukss = Ukss::where('church_id', $user->church_id)->get();

        // $ukssmem = Ukssmem::get();
        return view('ukssmem.ukss', compact('ukss', 'ukssmem'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $ukss_id = $request->input('ukss_id');
        $ukss = Ukss::find($ukss_id);
        $existingMemberIds = Ukssmem::where('church_id', $user->church_id)->pluck('member_id')->all();
        // dd($existingMemberIds);
        $member = Member::where('church_id', $user->church_id)
            ->whereNotIn('id', $existingMemberIds)
            ->get();

        // $ukssmem = Ukssmem::all();
        $selectedMember = Ukssmem::where('ukss_id', $ukss_id)->pluck('member_id')->toArray();

        return view('ukssmem.create', compact('ukss', 'member', 'ukss_id', 'selectedMember'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ukss_id = $request->input('ukss_id');
        $selectedMember = $request->input('member_ids', []);
        $originalMember = $request->input('original_member_ids', []);

        //untuk hapus unchecked
        $toDelete = array_diff($originalMember, $selectedMember);
        $ukssmem = Ukssmem::where('ukss_id', $ukss_id)->whereIn('member_id', $toDelete)->delete();
        
        //untuk yang baru di checked
        $toAdd = array_diff($selectedMember, $originalMember);
        foreach ($toAdd as $memberId) {
            $existingRecord = Ukssmem::where('ukss_id', $ukss_id)->where('member_id', $memberId)->first();

            if (!$existingRecord) {
                Ukssmem::create([
                    'member_id' => $memberId,
                    'ukss_id' => $ukss_id,
                    'church_id' => Auth::user()->church_id,
                    // 'triwulan_id' => $request->input('triwulan_id')
                ]);
            }
            
        }
        
        return redirect()->route('ukssmem.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($ukss_id)
    {

        $ukss = Ukss::find($ukss_id);
        // $member = Ukssmem::where('church_id', auth()->user()->church_id)->get();
        $ukssmem = Ukssmem::where('ukss_id', $ukss_id)->with('member')->get();
        $member = Member::get();
        return view('ukssmem.member', compact('ukss', 'member', 'ukss_id', 'ukssmem'));
    }

    public function showSec()
    {
        $user = Auth::user();
        $member = Member::get();
        // $member = Ukssmem::where('church_id', auth()->user()->church_id)->get();
        $ukssmem = Ukssmem::where('ukss_id', $user->ukss_id)->with('member')->get();
        return view('ukssmem.showSec', compact('member', 'ukssmem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function searchMembers(Request $request)
    {
        if($request->ajax()){

            $data=Ukssmem::where('member_id','like','%'.$request->search.'%')->get();
    
    
            $output='';

        if(count($data)>0){
    
            foreach($data as $row){
                $output .='
             <div class="form-check">
                <label class="form-check-label" for="member_{{ $m->id }}">
                    '.$row->member_id.'
                </label>
            </div>';
            }
             
    
    
        }
        else{
    
            $output .='
            <div class="form-check">
            <label class="form-check-label">
                No Result
            </label>
        </div>';
    
        }

        return $output;
    }
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
    public function destroy(Ukssmem $ukssmem)
    {
        $ukssmem = Ukssmem::find($ukssmem->id);

        if ($ukssmem) {
            $attendance = Attendance::where('ukssmem_id', $ukssmem->id)->get();

            foreach ($attendance as $a) {
                $a->delete();
            }
            
            $ukssmem->delete();
        }

    
        
        // dd($ukssmem);

        return redirect('/ukssmem');
    }
}
