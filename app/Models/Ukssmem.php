<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukssmem extends Model
{
    protected $fillable = ['member_id', 'ukss_id', 'church_id', 'triwulan_id'];

    public function member () {
        return $this->belongsTo('App\Models\Member');
    }

    public function ukss () {
        return $this->belongsTo('App\Models\Ukss');
    }

    public function church () {
        return $this->belongsTo('App\Models\Church');
    }

    public function attendance () {
        return $this->hasMany('App\Models\Attendance');
    }
}
