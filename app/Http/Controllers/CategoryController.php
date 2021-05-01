<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $merk = Merk::latest()->get();
        if ($merk) {
            return response([
                'success' => true,
                'message' => 'list of Merk',
                'data' => $merk,
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'data tidak berhasil ditampilkan!',
            ], 404);
        }
    }
}
