<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileHistory extends Model
{
    use HasFactory;
    
    // テーブルを強制指定する
    protected $table = 'profilehistories';
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'profilehistory_id' => 'required',
        'edited_at' => 'required',
    );
}
