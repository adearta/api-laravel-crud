<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Products::latest()->get();

        if ($product) {
            return response([
                'success' => true,
                'message' => 'list data of products',
                'data' => $product,
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'data tidak berhasil ditampilkan!',
            ], 404);
        }
    }

    public function storeProduct(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'image' => 'required|mimes:jpg,png,jpeg|max:3000',
            'nama_product' => 'required',
            'jenis_produk' => 'required',
            'harga_product' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);
        }
        if ($validate) {

            $imagefullname = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $imagefullname);

            $save = new Products();
            $save->image = $imagefullname;
            $save->nama_product = $request->nama_product;
            $save->jenis_produk = $request->jenis_produk;
            $save->harga_product = $request->harga_product;
            $save->save();

            return response()->json([
                'success' => true,
                'message' => 'product successfully saved!',
                'data' => Products::get(),
            ], 201);
        }
        return response()->json([
            'success' => false,
            'message' => 'failed to save!',

        ], 409);
    }
}
