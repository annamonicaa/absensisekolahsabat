<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'phone', 'address', 'gender', 'church_id'];

    // public function ukssmem()
    // {
    //     return $this->hasOne(Ukssmem::class, 'member_id');
    // }
}
