<?php

namespace App;
use App\Member;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function members() 
    {
        return $this->belongsToMany(Member::class);
    }
}
