<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Code;
use DB; 

class CodeController extends Controller
{
    public function __construct(){}

    /** Funcion que muestra la vista del formulario: Ver web.php en la linea 19 */
    public function index() {
        return view('validate'); //este es ele nombre del archivo que esta en resources/views (se omite la extensión .blade.php)
    }


    /** AQUI VIENE BUENO */

    /** Los valores que devuelve esta función los veras en el archivo validate.blade.php ubicado en resources/views
     * 
     * en la linea 63
     */
    public function storeLocal(Request $request){

        /**Revisa si el codigo ya existe en la db local */
        if(Code::exists($request->code)){


            /**En caso de que si exista en local, va a validar si ya se guardo en 'la nube' */
            if(Code::isOnLine($request->code)){
                return 'isonline';
            } else {

                /** en caso de que no devolvera que necesita hacerce post */
                return 'needtopost';
            }

            

            
        }else { /**Si no existe entonces hay que guardarlo */
            
            $code = new Code();

            $code->code = $request->code;

            $save = $code->save();

            if($save) {
                return 'saved'; /**se guardó */
            }

            return 'failed'; /**Valio madres algo salio mal */

        }

    }
}
