<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //library untuk memvalidasi inputan
use App\Models\Product; //memanggil model product
use Database\Seeders\ProductSeeder;

class ProductController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'type' => 'required|in:makanan, minuman, makeup',
            'expired_at' => 'required|date'
             
        ]);

        if($validator->fails()){
            return response()->json($validator->messages())->setStatusCode(422);
        }

       $validated = $validator->validated();
        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'type' => $validated['type'],
            'expired_at' => $validated['expired_at']
        ]);

        return response()->json('produk berhasil disimpan')-> setStatusCode(201);
    }

    public function show(){
        $products = Product::all();

        return response()->json($products)-> setStatusCode(200);
    }

    public function showById($id){
        $product = Product::where('id', $id)->first();

        if($product) {
            return response()->json([
                'msg' => 'Data produk dengan ID:' .$id,
                'data' => $product
            ],200);
        }

        return response()->json([
            'msg' => 'Data produk dengan ID: '.$id.' tidak ditemukan'
        ],404);
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'type' => 'required|in:makanan, minuman, makeup',
            'expired_at' => 'required|date'
             
        ]);

        if($validator->fails()){
            return response()->json($validator->messages())->setStatusCode(422);
        }

       $validated = $validator->validated();
        Product::where('id',$id)->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'type' => $validated['type'],
            'expired_at' => $validated['expired_at']
        ]);

        return response()->json('produk berhasil diupdate')-> setStatusCode(201);
    } 

    public function delete($id) {
        $product = Product::where('id',$id)->get();
        
        if ($product){
            Product::where('id', $id)->delete();

            return response()->json(['msg' => 'Data produk dengan id: '.$id.' berhasil di hapus'])-> setStatusCode(201);
        }

        return response()->json(['msg' => 'Data produk dengan id '.$id.' tidak ditemukan'])-> setStatusCode(404);

    }

}