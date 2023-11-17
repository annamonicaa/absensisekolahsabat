<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['ukssmem_id', 'member_id', 'status', 'ss', 'egw_book', 'meeting_id', 'ukss_id'];
    public function member () {
        return $this->hasMany('App\Models\Member');
    }

    public function ukssmem () {
        return $this->belongsTo('App\Models\Ukssmem');
    }

    public function meeting() {
        return $this->belongsTo('App\Models\Meeting');
    }
    
    public function ukss() {
        return $this->belongsTo('App\Models\Ukss');
    }
}
