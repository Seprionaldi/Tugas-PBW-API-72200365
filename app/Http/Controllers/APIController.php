<?php

namespace App\Http\Controllers;

use App\Komiks;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function searchKomiks(Request $request){
        $cari = $request->input('q');

        $komiks = Komiks::where('title', 'LIKE', "%$cari%")->get();

        if ($komiks->isEmpty())
        {
            return response()->json([
                'success' => false,
                'data' => 'Data tidak ditemukan'
            ], 404)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
        else 
        {
            return response()->json([
                'success' => true,
                'data' => $komiks
            ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
        }
}

