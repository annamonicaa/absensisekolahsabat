<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    protected $fillable = ['date', 'req', 'detail', 'church_id', 'user_id'];
    public function church () {
        return $this->belongsTo('App\Models\Church');
    }
    public function user () {
        return $this->belongsTo('App\Models\User');
    }
}
