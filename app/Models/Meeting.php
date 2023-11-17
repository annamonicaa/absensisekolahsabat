<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['triwulan_id', 'date'];
    
    public function attendance () {
        return $this->belongsTo('App\Models\Attendance');
    }

    public function triwulan () {
        return $this->belongsTo('App\Models\Triwulan');
    }
}
