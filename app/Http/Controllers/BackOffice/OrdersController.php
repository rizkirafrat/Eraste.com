<?php

namespace App\Http\Controllers\BackOffice;

use App\Customers;
use App\Http\Controllers\Controller;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class OrdersController extends Controller
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
        $data = Orders::with('products')->latest()->get();
        $table = DataTables::of($data)->toJson();

        return view('back/orders/home',[
            'table' => $table->original['data']
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function formOrders($id = '')
    {
        if ($id){
            $order = Orders::find($id);
            return view('back/orders/form_orders',[
                'order' => $order
            ]);
        }
        return view('back/order/form_orders');
    }

    public function processForm(\App\Http\Requests\Orders $request)
    {
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


            DB::commit();
        }catch (\Exception $e) {

            DB::rollBack();

            print_r($e->getMessage());
            die();
            // something went wrong
        }

        return redirect('/admin/orders');
    }

    public function deleteOrders($id)
    {
        DB::beginTransaction();
        try {
            $order = Orders::find($id);
            $order->delete();
            DB::commit();
        }catch (\Exception $e) {

            DB::rollBack();

            print_r($e->getMessage());
            die();
            // something went wrong
        }

        return redirect('/admin/orders');
    }
}
