@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">

            <h2 class=" font-weight-bolder text-secondary">Product</h2>
            <div class="row">
                @foreach($products as $p)
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5">
                                    <img src="{{ url('/gambar/'.$p->img_url) }}" class="img-fluid mb-4" alt="Responsive image">
                                    <h3 class="h5 font-weight-bold ">{{ $p->code_product . ' - ' . $p->name  }}</h3>
                                    <h4 class="h5 font-weight-bold text-danger">{{ 'Rp. ' . number_format($p->price,0)  }}</h4>
                                </div>

                                <a href="/order/{{  $p->id }}" class="btn btn-block btn-success text-white">Beli</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</div>
@endsection
