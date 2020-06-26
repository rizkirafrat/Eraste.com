@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col col-lg-5  col-md-5">
            <h3 class="title-el mb-3">Order Information</h3>

            <p class="text-detail ">{{ $product->code_product . ' - ' . $product->name }}</p>
            <p class="text-detail ">{{ 'Rp. ' . number_format($product->price,0)  }}</p>
            <p class="text-detail ">Qty 1 Pcs</p>

            <h3 class="title-el mb-3 mt-4">Customer Information</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/order/orders_process" method="post">
                @csrf
                <input type="hidden" name="id_product" value="{{ $product->id  }}">
                <div class="form-group">
                    <label class="text-label" for="fullname">Nama</label>
                    <input class="form-control" type="text" name="fullname" value="{{ old('fullname') }}">
                </div>
                <div class="form-group">
                    <label class="text-label" for="phone">Phone</label>
                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label class="text-label" for="address">Address</label>
                    <textarea class="form-control" name="address" rows="5">
                        {{ old('address') }}
                    </textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-success bg-button-primary btn-block" type="submit" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
