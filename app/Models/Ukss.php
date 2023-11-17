<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukss extends Model
{
    protected $fillable = ['church_id', 'name', 'leader', 'secretary', 'loc', 'triwulan_id'];
    public function church () {
        return $this->belongsTo('App\Models\Church');
    }

    // public function ukssmem()
    // {
    //     return $this->hasMany(Ukssmem::class, 'ukss_id');
    // }
}
