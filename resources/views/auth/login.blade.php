@extends('layouts.app')

@section('content')
    <div class="container-login100">
        <div class="wrap-login100 p-6">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title pb-5">
                    Login
                </span>
                <div class="panel panel-primary">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu1">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">Sign In</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body p-0 pt-5">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab5">
                                <div class="wrap-input100 validate-input input-group"
                                    data-bs-validate="Valid email is required: ex@abc.xyz">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                    </a>
                                    <input required name="email" id="email"
                                        class="input100 border-start-0 form-control ms-0" type="email"
                                        placeholder="Email">
                                </div>
                                
                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                    </a>
                                    <input required name="password" id="password"
                                        class="input100 border-start-0 form-control ms-0" type="password"
                                        placeholder="Password">
                                </div>

                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                <div class="text-end pt-4">
                                    <p class="mb-0"><a href="{{ route('password.request') }}" class="text-primary ms-1">Forgot
                                            Password?</a></p>
                                </div>
                                <div class="container-login100-form-btn">
                                    <button type="submit" class="login100-form-btn btn-primary">Login</button>

                                </div>
                                <div class="text-center pt-3">
                                    <p class="text-dark mb-0">Not a member?<a href="{{route('register')}}"
                                            class="text-primary ms-1">Sign UP</a></p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
