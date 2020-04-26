<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PersonasController extends Controller
{
    public function index() {
        $data=null;
        $transaction = true;
        $message = "";
        
        // $periodoid = $request ['periodoid'];
        // $programaid = $request ['programaid'];

        $datos = DB::select ("
        select 
            p.id as id,
            p.primer_nombre as name,
            p.primer_apellido as apellidos
        from 
            personas p
        order by id asc
        ");

        return response () -> json ([
            "success" => true,
            "data" => $datos
        ]);
    }

    public function store(Request $request) {    
        return 'store';
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
