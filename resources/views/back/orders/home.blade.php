@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col col-lg-8  col-md-8">
                <div class="mb-3">
                    <h3 class="title-el mb-3" style="display: inline">List Orders</h3>

                </div>

                <table class="table table-hover table-list" style="width:100%;border:2px solid #000">
                    <tr>
                        <th>Order Code</th>
                        <th>Name</th>
                        <th class="text-right">Price</th>
                        <th class="text-center">Action</th>
                    </tr>
                    @foreach($table as $t)
                        <tr>
                            <td>{{ str_pad($t['id'],'6','0',STR_PAD_LEFT) }}</td>
                            <td>{{ $t['products']['name']  }}</td>
                            <td class="text-right" >{{ 'Rp. ' . number_format($t['products']['price'],0)  }}</td>
                            <td>
                                <div style="display:flex;">
                                    <a href="orders/update/{{ $t['id']  }}" class="btn btn-sm btn-primary mr-2" href="" style="flex:1;">Edit</a>
                                    <a href="orders/delete/{{ $t['id']  }}" class="btn btn-sm btn-danger" href="" style="flex:1;">Delete</a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
