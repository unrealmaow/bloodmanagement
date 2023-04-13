@extends('layouts.app')

@section('content')
    <div class="container-login100">
        <div class="wrap-login100 p-6">
            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
                <span class="login100-form-title">
                    Receiver Registration
                </span>
                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                        <i class="mdi mdi-account" aria-hidden="true"></i>
                    </a>
                    <input required name="name" id="name" class="input100 border-start-0 ms-0 form-control"
                        type="text" placeholder="Full Name">
                </div>
                @if ($errors->has('name'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <div class="wrap-input100 validate-input input-group"
                    data-bs-validate="Valid email is required: ex@abc.xyz">
                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                    </a>
                    <input required name="email" id="email" class="input100 border-start-0 ms-0 form-control"
                        type="email" placeholder="Email">
                </div>

                @if ($errors->has('email'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div class="wrap-input100 validate-input input-group"
                    data-bs-validate="Valid Phone is required: 03016665550">
                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-phone" aria-hidden="true"></i>
                    </a>
                    <input required name="phone" id="phone" class="input100 border-start-0 ms-0 form-control"
                        type="number" placeholder="Phone No">
                </div>

                @if ($errors->has('phone'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif

                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                    </a>
                    <input required name="password" id="password" class="input100 border-start-0 ms-0 form-control"
                        type="password" placeholder="Password">
                </div>

                @if ($errors->has('password'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                    </a>
                    <input required name="password_confirmation" id="password_confirmation"
                        class="input100 border-start-0 ms-0 form-control" type="password" placeholder="Confirm Password">
                </div>

                @if ($errors->has('password_confirmation'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn btn-primary">Regiser As Receiver</button>
                </div>
                <div class="text-center pt-3">
                    <p class="text-dark mb-0 d-inline-flex">Already have account ?<a href="{{ route('login') }}"
                            class="text-primary ms-1">Sign In</a></p>
                </div>

                <div class="text-center pt-3">
                    <p class="text-dark mb-0 d-inline-flex">Want to Donate ?<a href="{{ route('register_donator') }}"
                            class="text-primary ms-1">Register As Donator</a></p>
                </div>

            </form>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
