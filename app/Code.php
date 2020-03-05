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

    /** Función para revisar si el codigo existe en la BD */
    public static function exists($code){
        $exists = DB::table('codes')->where('code','=',$code)->first();

        if($exists === null){
            return false;
        }

        return true;
    }

    /** Función que valida si el código esta online (el valor siempre sera 0, porque no se que datos te va a devolver la API) */
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
