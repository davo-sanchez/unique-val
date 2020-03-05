<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validate;
use DB; 

class ValidateController extends Controller
{
    public function __construct(){}

    public function index() {
        return view('validate');
    }

    public function storeLocal(Request $request){

        if(Validate::exists($request->code)){
            
        }else {
            
            $validate = new Validate();

            $validate->code = $request->code;

            $save = $validate->save();

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
