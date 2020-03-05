<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Code extends Model
{
    protected $primaryKey = 'pk_code_id';

    protected $fillable = [
        'code'
    ];


    public static function exists($code){
        $exists = DB::table('codes')->where('code','=',$code)->first();

        if($exists === null){
            return false;
        }

        return true;
    }

    public static function isOnLine ($code){

        $online = DB::table('codes')->where([
            ['code','=',$code]
        ])->first();

        if($online->isonline == 1){
            return true;
        }

        return false; 

    }
}
