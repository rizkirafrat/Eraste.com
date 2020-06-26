<?php

namespace App\Http\Controllers\BackOffice;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Products::latest()->get();
        $table = DataTables::of($data)->toJson();
        return view('back/product/home',[
            'table' => $table->original['data']
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function formProduct($id = '')
    {
        if ($id){
            $product = Products::find($id);
            return view('back/product/form_product',[
                'product' => $product
            ]);
        }
        return view('back/product/form_product');
    }

    public function processForm(\App\Http\Requests\Products $request)
    {
        // Query Insert Data

        DB::beginTransaction();
        try {
            $data = [
                'code_product' => $request->code_product,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock
            ];

            $file = $request->file('img_url');
            if ($file) {
                $file->move('gambar', $file->getClientOriginalName());
                $data['img_url'] = $file->getClientOriginalName();
            }

            if ($request->id){
                $products = \App\Products::updateOrCreate(
                    [
                        'id' => $request->id,
                    ],
                    $data
                );
            }else{
                $products = \App\Products::create($data);
            }


            DB::commit();
        }catch (\Exception $e) {

            DB::rollBack();

            print_r($e->getMessage());
            die();
            // something went wrong
        }

        return redirect('/admin/products/');
    }

    public function deleteProduct($id)
    {
        DB::beginTransaction();
        try {
            $product = Products::find($id);
            $product->delete();
            DB::commit();
        }catch (\Exception $e) {

            DB::rollBack();

            print_r($e->getMessage());
            die();
            // something went wrong
        }

        return redirect('/admin/products');
    }

}
