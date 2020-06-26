@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center ">
        <div class="col col-lg-5 col-md-5 align-self-center" style="margin-top:20vh">
            <h3 class="title-el text-center mb-3">Login Back Office</h3>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group mb-4">
                    <label class="text-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label class="text-label" for="phone">Password</label>
                    <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="btn btn-success bg-button-primary btn-block" type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
