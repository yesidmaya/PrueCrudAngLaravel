<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class PerUpdateController extends Controller
{
    public function index() {
        //
    }

    public function store(Request $request) {    
        return 'store';
    }

    public function update(Request $request, $id) {
        $data = 0;
        $transaction = true;
        $message = "";

        $collection =
            array(
                'primer_nombre' => $request['name'],
                'primer_apellido' => $request['apellidos']
            );
            // $input = $request->exception(['saber']);

        try {
            $data = DB::table('personas')->where('id',$id)->update($collection);
            $message = ($data>0) ? 'Registro Actualizado Correctamente' : 'No Fue Posible Actualizar el Registro';
        } catch (\Throwable $th) {
            $transaction = false;
            $message = $e->getMessage();
        }

        return response () -> json ([
            "success" => $transaction,
            "msg" => $message,
            "data" => $data
        ]);
    }

    public function show($id) {
        return 'show/' . $id;
    }

    public function destroy($id) {
        return 'destroy/' . $id;
    }
}
