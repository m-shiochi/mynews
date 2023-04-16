<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    // 14で追記
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
    //　ここまで
    
    // 17で追記
    // News ModelにHistroryの関連付けを行う
    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
