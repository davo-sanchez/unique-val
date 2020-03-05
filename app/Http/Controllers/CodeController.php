<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Code;
use DB; 

class CodeController extends Controller
{
    public function __construct(){}

    public function index() {
        return view('validate');
    }

    public function storeLocal(Request $request){

        if(Code::exists($request->code)){

            if(Code::isOnLine($request->code)){
                return 'isonline';
            } else {
                return 'needtopost';
            }

            

            
        }else {
            
            $code = new Code();

            $code->code = $request->code;

            $save = $code->save();

            if($save) {
                return 'saved';
            }

            return 'failed';

        }
/*
        $messages = [
            'code.required' => 'El código es requerido',
            'code.unique' => 'El código ya existe'
        ];

        $request->validate($request, [
            'code' => 'required|unique:codes,code'
        ]);*/

    }
}
