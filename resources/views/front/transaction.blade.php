@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col col-lg-6  col-md-6">
            <h3 class="title-el mb-4">Success!</h3>

            <dl class="row">
                <dt class="col-sm-4 text-detail">Order No</dt>
                <dd class="col-sm-8 text-right text-detail">{{ str_pad($order->id,'6','0',STR_PAD_LEFT)  }}</dd>

                <dt class="col-sm-4 text-detail">Product Name</dt>
                <dd class="col-sm-8 text-right text-detail">
                    {{ $order->products->code_product . ' - ' . $order->products->name  }}
                </dd>

                <dt class="col-sm-4 text-detail">Qty</dt>
                <dd class="col-sm-8 text-right text-detail">
                    {{ $order->qty  }}
                </dd>

                <dt class="col-sm-4 text-detail">Total</dt>
                <dd class="col-sm-8 text-right text-detail">
                    {{ 'Rp. ' . number_format($order->qty * $order->products->price,0)  }}
                </dd>


            </dl>

        </div>
    </div>
</div>
@endsection
