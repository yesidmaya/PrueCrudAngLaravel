<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PerDeleteController extends Controller
{
    public function index() {
        //
    }

    public function store(Request $request) {    
        
        //
    }

    public function update(Request $request, $id) {
        return 'update/' . $id;
    }

    public function show($id) {
        return 'show/' . $id;
    }

    public function destroy($id) {
        
        $data = null;
        $transaction = true;
        $message = "";

        try {
            $data = DB::table('personas')->where('id',$id)->delete();
            $message = ($data==1) ? 'Registro eliminado satisfactoriamente' : 'No fue eliminado el registro';

        } catch (\Exception $e) {
            $transaction = false;
            $message = $e->$message;
        }

        return response() -> json ([
            "succes" => $transaction,
            "msg" => $message,
            "data" => $data
        ]);
    }
}
