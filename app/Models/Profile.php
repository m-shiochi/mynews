<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    // 14の課題で追記
    protected $guarded = array('id');
    
    public static $rules = array(
        'familyname' => 'required',
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    //　ここまで
    
    // 17の課題で追記
    public function profilehistories()
    {
        return $this->hasMany('App\Models\ProfileHistory', 'profilehistory_id');
    }
    
}
