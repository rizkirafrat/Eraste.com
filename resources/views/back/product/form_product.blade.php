@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col col-lg-5  col-md-5">
                <h3 class="title-el mb-3 mt-4">Create Product Form</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/admin/products/process_form" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ !empty($product->id) ? $product->id : '' }}">
                    <div class="form-group">
                        <label class="text-label" for="code_product">Code</label>
                        <input class="form-control" type="text" name="code_product" value="{{ !empty($product->code_product) ? $product->code_product : old('code_product') }}">
                    </div>
                    <div class="form-group">
                        <label class="text-label" for="name">Name</label>
                        <input class="form-control" type="text" name="name" value="{{ !empty($product->name) ? $product->name : old('name') }}">
                    </div>
                    <div class="form-group">
                        <label class="text-label" for="price">Price</label>
                        <input class="form-control" type="text" name="price" value="{{ !empty($product->price) ? $product->price : old('price') }}">
                    </div>
                    <div class="form-group">
                        <label class="text-label" for="stock">Stock</label>
                        <input class="form-control" type="text" name="stock" value="{{ !empty($product->stock) ? $product->stock : old('stock') }}">
                    </div>
                    <div class="form-group">
                        <label class="text-label" for="img_url">File</label>
                        <input class="form-control border-0 pl-0" type="file" name="img_url">
                        <span class="text-muted ">{{ !empty($product->img_url) ? $product->img_url : old('file') }}</span>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success bg-button-primary btn-block" type="submit" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
