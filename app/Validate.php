<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Validate extends Model
{
    protected $primaryKey = 'pk_code_id';

    protected $fillable = [
        'code'
    ];


    public static function exists($code){
        $code = DB::table('codes')->where('code','=',$code)->first();

        if($code === null){
            return false;
        }

        return true;
    }
}
