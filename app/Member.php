<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'membership_no', 
        'nric', 
        'name', 
        'gender', 
        'address',
        'state',
        'phone', 
        'division_id'
    ];

    public function division()
    {
        return $this->belongsTo('App\Division');
    }
}
