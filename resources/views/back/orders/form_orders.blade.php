@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col col-lg-5  col-md-5">
                <h3 class="title-el mb-3 mt-4">Update Order Form</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/admin/orders/process_form" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ !empty($order->id) ? $order->id : '' }}">
                    <div class="form-group">
                        <label class="text-label" for="fullname">Name</label>
                        <input class="form-control" type="text" name="fullname" value="{{ !empty($order->customers->fullname) ? $order->customers->fullname : old('fullname') }}">
                    </div>
                    <div class="form-group">
                        <label class="text-label" for="phone">Phone</label>
                        <input class="form-control" type="text" name="phone" value="{{ !empty($order->customers->phone) ? $order->customers->phone : old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label class="text-label" for="address">Address</label>
                        <textarea class="form-control" name="address" rows="5">
                            {{ !empty($order->customers->address) ? $order->customers->address : old('address') }}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success bg-button-primary btn-block" type="submit" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
