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
        'postcode',
        'city',
        'state',
        'phone', 
        'image',
        'division_id'
    ];

    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    public function groups() 
    {
        return $this->belongsToMany('App\Group');
    }
}
