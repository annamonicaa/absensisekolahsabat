<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use App\Models\Meeting;
use App\Models\Ukssmem;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Triwulan;
use App\Models\Ukss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $member = Member::get();
        // $attendance = Attendance::latest()->get();  
        // $meeting = Meeting::get();   
           
        $user = Auth::user();
        // $ukss = Ukss::find($ukss_id);
        $ukssmem = Ukssmem::get();
        $meeting = Meeting::latest()->get();
        $attendance = Attendance::where('ukss_id', $user->ukss_id)->selectRaw('MIN(id) as id, meeting_id')
                    ->groupBy('meeting_id')->get();

        // $user = Auth::user();

        // $meeting = Meeting::latest()->get();
        // $attendance = $user->ukssmem ? Attendance::where('ukss_id', $user->ukssmem->ukss_id)
        //     ->selectRaw('MIN(id) as id, meeting_id')
        //     ->groupBy('meeting_id')
        //     ->get() : null;


        // $attendance = Attendance::where('ukss_id', $user->ukss_id ?? null)
        //     ->selectRaw('MIN(id) as id, meeting_id')
        //     ->groupBy('meeting_id')
        //     ->get();

        return view('attendance.date', compact('attendance'));
    }

    public function index2($ukss_id)
    {
        
        $user = Auth::user();

        $ukssmem = Ukssmem::get();
        $meeting = Meeting::latest()->get();
        $ukss = Ukss::find($ukss_id);
        $attendance = Attendance::where('ukss_id', $ukss_id)->selectRaw('MIN(id) as id, meeting_id')
                    ->groupBy('meeting_id')->get();
        // dd($attendance);
       
        return view('attendance.date2', compact('attendance', 'ukss_id'));
    }

    public function ukss() {
        $user = Auth::user();
        $ukss = Ukss::where('church_id', $user->church_id)->get();

        return view('attendance.ukss', compact('ukss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $member = Member::get();
        // $meeting = Meeting::get();
        // return view('attendance.create', compact('member', 'meeting'));
        // $member = Member::get();
        // return view('attendance.create', compact('member'));
        $user = Auth::user();
        $meeting = Meeting::latest()->get();
        $ukssmem = Ukssmem::where('ukss_id', $user->ukss_id)->get();
        $member = Member::all();
        $triwulan = Triwulan::all();
        $ukss = Ukss::all();

        return view('attendance.create', compact('ukssmem', 'member', 'meeting', 'triwulan'));
    }

    public function create2($ukss_id)
    {
        // $member = Member::get();
        // $meeting = Meeting::get();
        // return view('attendance.create', compact('member', 'meeting'));
        // $member = Member::get();
        // return view('attendance.create', compact('member'));
        $user = Auth::user();
        $meeting = Meeting::latest()->get();
        // $ukssmem = Ukssmem::where('ukss_id', $user->ukss_id)->get();
        $ukssmem = Ukssmem::where('ukss_id', $ukss_id)->get();
        
        $member = Member::all();
        $triwulan = Triwulan::all();
        $ukss = Ukss::all();

        return view('attendance.create2', compact('ukssmem', 'member', 'meeting', 'triwulan', 'ukss_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        foreach ($request->attendance as $attendanceData) {
            $attendanceData['meeting_id'] = $request->input('meeting_id');
            $attendanceData['ukss_id'] = $request->input('ukss_id');
            Attendance::create($attendanceData);
        }
        
        if (Auth::user()->role_id == 4) {
            $redirectPath = '/staff/attendance';
        } else {
            $redirectPath = '/attendance';
        }
        

        return redirect($redirectPath);

 
    }

    //untuk sekretaris
    public function showSec($meetingId)
    {
        $user = Auth::user();
        $meetingIdConvert = intval($meetingId);
        
        $ukssIdConvert = intval($user->ukss_id);
        // dd($ukssIdConcert);
        // dd($meetingIdConvert);
        // $ukss = Ukss::find($ukss_id);
        $attendance = Attendance::where('meeting_id', $meetingIdConvert)->where('ukss_id', $ukssIdConvert)->get();
        // $attendanceId = Attendance::where($attendances->id)->get();
        // dd($attendance);
        return view('attendance.index3', compact('attendance'));
    }

    //untuk staff
    public function show($ukss_id, $meetingId)
    {
        $user = Auth::user();
        $meetingIdConvert = intval($meetingId);
        
        $ukssIdConvert = intval($ukss_id);
        // dd($ukssIdConcert);
        // dd($meetingIdConvert);
        // $ukss = Ukss::find($ukss_id);
        $attendance = Attendance::where('meeting_id', $meetingIdConvert)->where('ukss_id', $ukssIdConvert)->get();
        // $attendanceId = Attendance::where($attendances->id)->get();
        // dd($attendance);
        return view('attendance.index', compact('attendance', 'ukss_id', 'meetingId'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ukss_id, $meetingId)
    {
        $meetingIdConvert = intval($meetingId);
        $ukssIdConvert = intval($ukss_id);
        
        $attendance = Attendance::where('meeting_id', $meetingIdConvert)->where('ukss_id', $ukssIdConvert)->first();
        
        $user = Auth::user();
        $meeting = Meeting::all();
        $ukssmem = Ukssmem::where('ukss_id', $ukss_id)->get();
        // dd($ukssmem);
        $member = Member::all();
        $triwulan = Triwulan::all();
        $attendanceRecords = Attendance::where('meeting_id', $attendance->meeting_id)->get();
        // $attendance = Attendance::get();
        // $records = DB::table('ukssmems')->join('attendances', 'ukssmems.id', '=', 'attendances.ukssmem_id')->get();
        

        return view('attendance.edit', compact('attendanceRecords', 'ukss_id', 'meetingId' ,'attendance', 'ukssmem', 'member', 'meeting', 'triwulan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ukss_id, $meetingId)
    {
        $meetingIdConvert = intval($meetingId);
        $ukssIdConvert = intval($ukss_id);
        
        $attendance = Attendance::where('meeting_id', $meetingIdConvert)->where('ukss_id', $ukssIdConvert)->first();
        
        foreach ($request->attendance as $attendanceData) {
            // Add meeting_id and ukss_id to each $attendanceData
            $attendanceData['meeting_id'] = $request->input('meeting_id');
            $attendanceData['ukss_id'] = $ukss_id;
        
            // Create a new instance of the Attendance model
            $attendanceModel = new Attendance();
        
            // Update the record in the Attendance table where 'id' matches $attendanceData['id']
            $attendanceModel->where('meeting_id', $attendanceData['meeting_id'])->update($attendanceData);
        }
                // dd($request);
                if (Auth::user()->role_id == 4) {
                    $redirectPath = '/staff/attendance';
                } else {
                    $redirectPath = '/attendance';
                }
                
        
                return redirect($redirectPath);
    }

    /**
     * Remove the specified resource from storage.
     */
    // AttendanceController.php
    public function destroy($ukss_id, $meetingId)
    {
        // dd($ukss_id, $meetingId);
        DB::table('attendances')
            ->where('meeting_id', $meetingId)
            ->where('ukss_id', $ukss_id)
            ->delete();

        // dd($meetingId, $ukssId);
        if (Auth::user()->role_id == 4) {
            $redirectPath = '/staff/attendance';
        } else {
            $redirectPath = '/attendance';
        }
        

        return redirect($redirectPath);
    }



}
