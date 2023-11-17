<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use App\Models\Church;
use App\Http\Controllers\PrayerController;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $prayer = Prayer::where('church_id', $user->church_id)
            ->latest()
            ->get();
        return view('admin.home', compact('prayer'));
        
    }

    public function sec()
    {
        $user = Auth::user();
        $prayer = Prayer::where('church_id', $user->church_id)
            ->latest()
            ->get();
        return view('sec.home', compact('prayer'));
    }

    public function konferens()
    {
        $attendance = Attendance::get();
        $totalHadir = Attendance::whereIn('status', ['hadir', 'terlambat'])->count();
        $totalSemua = Attendance::count();

        $percentageAll = ($totalHadir/$totalSemua)*100;

        $results = DB::table('churches')
            ->join('uksses', 'churches.id', '=', 'uksses.church_id')
            ->join('attendances', 'uksses.id', '=', 'attendances.ukss_id')
            ->select(
                'churches.name',
                DB::raw('COUNT(CASE WHEN attendances.status = "hadir" THEN 1 END) AS hadir_count'),
                DB::raw('COUNT(CASE WHEN attendances.status = "terlambat" THEN 1 END) AS terlambat_count'),
                DB::raw('COUNT(attendances.status) AS total'),
                DB::raw('TRIM(TRAILING "." FROM TRIM(TRAILING "0" FROM CAST((COUNT(CASE WHEN attendances.status = "hadir" THEN 1 END) + COUNT(CASE WHEN attendances.status = "terlambat" THEN 1 END)) / COUNT(attendances.status) * 100 AS CHAR))) AS percent')
            )
            ->groupBy('churches.name')
            ->get();

            // dd($prayer);
        // $attendancePercentage = ($result / $total) * 100;

        $prayer = Prayer::latest()->get();
        $church = Church::get();
        // dd($prayer);
        return view('konferens.home', compact('prayer', 'results', 'percentageAll'));
    }

    public function staff()
    {
        $user = Auth::user();
        $prayer = Prayer::where('church_id', $user->church_id)
            ->latest()
            ->get();
        return view('staff.home', compact('prayer'));
    }
}
