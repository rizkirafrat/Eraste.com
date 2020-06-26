<?php

namespace App\Http\Controllers\BackOffice;

use App\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CustomersController extends Controller
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
        $data = Customers::latest()->get();
        $table = DataTables::of($data)->toJson();

        return view('back/customers/home',[
            'table' => $table->original['data']
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function formCustomers($id = '')
    {
        if ($id){
            $customer = customers::find($id);
            return view('back/customers/form_customers',[
                'customer' => $customer
            ]);
        }
        return view('back/customers/form_customers');
    }

    public function processForm(\App\Http\Requests\Orders $request)
    {
        // Query Insert Data

        DB::beginTransaction();
        try {
            $customer = Customers::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'phone' => $request->phone,
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

        return redirect('/admin/customers');
    }

    public function deleteCustomers($id)
    {
        DB::beginTransaction();
        try {
            $customers = Customers::find($id);
            $customers->delete();
            DB::commit();
        }catch (\Exception $e) {

            DB::rollBack();

            print_r($e->getMessage());
            die();
            // something went wrong
        }

        return redirect('/admin/customers');
    }
}
