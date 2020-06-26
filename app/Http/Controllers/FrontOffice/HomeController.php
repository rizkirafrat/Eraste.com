<?php

namespace App\Http\Controllers\FrontOffice;

use App\Customers;
use App\Http\Requests\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Query Get All Data
        $products = Products::all();

        return view('/front/home',[
            'products' => $products
        ]);
    }

    public function orders($id_product){
        // Query Get All Data
        $product = Products::find($id_product);

        return view('/front/order',[
            'product' => $product
        ]);
    }

    public function orderProcess(Orders $request){
        // Query Insert Data

        DB::beginTransaction();
        try {
            $customer = Customers::updateOrCreate(
                [
                    'phone' => $request->phone,
                ],
                [
                    'fullname' => $request->fullname,
                    'address' => $request->address,
                ]
            );

            $order = \App\Orders ::create([
                'products_id' => $request->id_product,
                'customers_id' => $customer->id,
                'qty' => 1,
                'status' => 1,
            ]);

            DB::commit();
        }catch (\Exception $e) {

            DB::rollBack();

            print_r($e->getMessage());
            die();
            // something went wrong
        }

        return redirect('/order/transaction/'. $order->id);
    }

    public function transaction($id_trx){
        // Query Get All Data
        $order = \App\Orders::find($id_trx);

        return view('/front/transaction',[
            'order' => $order
        ]);
    }


}
