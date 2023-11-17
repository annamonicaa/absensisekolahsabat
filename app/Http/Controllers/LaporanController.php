<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Meeting;
use App\Models\Ukss;
use App\Models\Church;
use App\Models\Ukssmem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function laporanJemaat() {
        $percentage = [];
    
        $church = Church::get();
        $ukss = Ukss::get();
    
        foreach ($church as $c) {
            $totalHadir = DB::table('attendances')
                ->select(DB::raw('COUNT(CASE WHEN status IN ("hadir", "terlambat") THEN 1 END) AS datang'))
                ->join('uksses', 'attendances.ukss_id', '=', 'uksses.id')
                ->where('uksses.church_id', $c->id)
                ->first();
    
            $totalSemua = DB::table('attendances')
                ->select(DB::raw('COUNT(*) AS jumlah'))
                ->join('uksses', 'attendances.ukss_id', '=', 'uksses.id')
                ->where('uksses.church_id', $c->id)
                ->first();
    
            $totalHadirCount = $totalHadir->datang ?? 0;
            $totalSemuaCount = $totalSemua->jumlah ?? 0;
    
            $attendancePercentage = ($totalSemuaCount > 0) ? ($totalHadirCount / $totalSemuaCount) * 100 : 0;
    
            $percentage[] = [
                'church_id' => $c->id,
                'church_name' => $c->name,
                'attendancePercentage' => $attendancePercentage,
            ];
        }
        

        return view('laporan.church', compact('percentage'));
        // dd('church');

    }

    public function count() {
        $attendance = Attendance::get();
        $meeting = Meeting::get();
        $ukss = Ukss::get();

        $totalHadir = Attendance::where('status', 'hadir')->count();
        $totalSemua = Attendance::count();

        $attendancePercentage = ($totalHadir / $totalSemua) * 100;

        $result = DB::table('uksses')
            ->join('ukssmems', 'uksses.id', '=', 'ukssmems.ukss_id')
            ->select('uksses.name', DB::raw('COUNT(ukssmems.member_id) as jumlah'))
            ->groupBy('uksses.name')
            ->get();

            // var_dump($result);
            // dd($result);

        return view('laporan', compact('result', 'totalHadir', 'attendancePercentage'));

    }

    public function coba() {

        $user = Auth::user();
        $percentage = [];
    
        $ukssRecords = Ukss::where('church_id', $user->church_id)->get();

    
        foreach ($ukssRecords as $ukss) {
            $attendanceDetails = $this->list($ukss->id);

            $totalHadir = DB::table('attendances')
                ->select(DB::raw('COUNT(CASE WHEN status IN ("hadir", "terlambat") THEN 1 END) AS datang'))
                ->where('ukss_id', $ukss->id)
                ->first();
    
            $totalSemua = DB::table('attendances')
                ->select(DB::raw('COUNT(*) AS jumlah'))
                ->where('ukss_id', $ukss->id)
                ->first();
    
            $totalHadirCount = $totalHadir->datang ?? 0;
            $totalSemuaCount = $totalSemua->jumlah ?? 0;
    
            $attendancePercentage = ($totalSemuaCount > 0) ? ($totalHadirCount / $totalSemuaCount) * 100 : 0;
            $ukssmemIds = $attendanceDetails->pluck('member_id')->toArray();
            

            $percentage[] = [
                'ukss_id' => $ukss->id,
                'ukss_name' =>$ukss->name,
                'attendancePercentage' => $attendancePercentage,
                'attendanceDetails' => $attendanceDetails,
                'ukssmem_ids' =>$ukssmemIds
            ];
        }
        // dd($percentage);
        return view('laporan.ukss', compact('percentage'));
    }

    public function jemaatukss($church_id) {

        $churchIdConvert = intval($church_id);
        // dd($churchIdConvert);
        $percentage = [];
    
        $ukssRecords = Ukss::where('church_id', $churchIdConvert)->get();
        // dd($ukssRecords);
        
        foreach ($ukssRecords as $ukss) {
            $attendanceDetails = $this->list($ukss->id);

            $totalHadir = DB::table('attendances')
                ->select(DB::raw('COUNT(CASE WHEN status IN ("hadir", "terlambat") THEN 1 END) AS datang'))
                ->where('ukss_id', $ukss->id)
                ->first();
    
            $totalSemua = DB::table('attendances')
                ->select(DB::raw('COUNT(*) AS jumlah'))
                ->where('ukss_id', $ukss->id)
                ->first();
    
            $totalHadirCount = $totalHadir->datang ?? 0;
            $totalSemuaCount = $totalSemua->jumlah ?? 0;
    
            $attendancePercentage = ($totalSemuaCount > 0) ? ($totalHadirCount / $totalSemuaCount) * 100 : 0;
            
            $ukssmemIds = $attendanceDetails->pluck('member_id')->toArray();

            $percentage[] = [
                'ukss_id' => $ukss->id,
                'ukss_name' =>$ukss->name,
                'attendancePercentage' => $attendancePercentage,
                'attendanceDetails' => $attendanceDetails,
                'ukssmem_ids' => $ukssmemIds
            ];
        }
        // dd($percentage);
        return view('laporan.jemaatukss', compact('percentage'));
    }
    
    

    public function list($ukss_id) {
        $result = DB::table('attendances')
            ->join('ukssmems', 'ukssmems.id', '=', 'attendances.ukssmem_id')
            ->join('members', 'members.id', '=', 'ukssmems.member_id')
            ->join('uksses', 'uksses.id', '=', 'ukssmems.ukss_id')
            ->whereIn('attendances.status', ['hadir', 'terlambat', 'absen'])
            ->where('uksses.id', $ukss_id)
            ->groupBy('ukssmems.member_id', 'members.name', 'uksses.id', 'uksses.name')
            ->select(
                'ukssmems.member_id',
                'members.name',
                'uksses.id as ukss_id',
                'uksses.name as ukss_name',
                DB::raw('SUM(CASE WHEN attendances.status = "hadir" THEN 1 ELSE 0 END) as yanghadir'),
                DB::raw('SUM(CASE WHEN attendances.status = "terlambat" THEN 1 ELSE 0 END) as yangterlambat'),
                DB::raw('SUM(CASE WHEN attendances.status = "absen" THEN 1 ELSE 0 END) as yangabsen')
            )->get();
    
            // dd($result);
        // return view('coba', compact('result', 'ukss_id'));
        return $result;
    }

    public function laporanAnggota($ukssmem_ids) {
        $ukssmemConvert = intval($ukssmem_ids);
        // dd($ukssmemConvert);
    
        // Find the Ukssmem record based on member_id
        $ukssmem = Ukssmem::where('member_id', $ukssmem_ids)->first();
    
        // Check if a valid Ukssmem record is found
        if ($ukssmem) {
            // Continue with the attendance query
            $attendance = Attendance::where('ukssmem_id', $ukssmem->id)->get();
            // dd($attendance);
            
        } else {}

        return view('laporan.anggota', compact('attendance'));
    }
    
    
}
