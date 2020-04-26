<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PerSaveController extends Controller
{
    public function index() {
        //
    }

    public function store(Request $request) {    
        
        $data=0;
        $transaction = true;
        $message = "";

        $name = $request->input('name');
        $apellidos = $request->input('apellidos');        

        try{
            $id = DB::table('personas')->insertGetId(
                [
                    'primer_nombre' => $name,
                    'primer_apellido' => $apellidos
                ]
            );
            $message = "Los datos se guardaron correctamente";
        }
        catch(\Exception $e){
            $transaction = false;
            $message = $e->getMessage();
        }

        return response() -> json (
            [
                "success" => true,
                "msg" => $message

            ]
        );
    }

    public function update(Request $request, $id) {
        return 'update/' . $id;
    }

    public function show($id) {
        return 'show/' . $id;
    }

    public function destroy($id) {
        return 'destroy/' . $id;
    }
}
