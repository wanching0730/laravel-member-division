<?php

namespace App;
use App\Member;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    //protected $table = 'group';
    
    public function members() 
    {
        return $this->belongsToMany(Member::class, 'member_group_rel');
    }
}
