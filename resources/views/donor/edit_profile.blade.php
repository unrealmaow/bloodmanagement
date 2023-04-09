
@extends('donor.layout.app')
@section('content')

<div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Edit Profile</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Edit Password</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center chat-image mb-5">
                                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                                <a class="" href="#"><img alt="avatar" src="{{url('/sash')}}/assets/images/avatars/default.avif" class="brround"></a>
                                            </div>
                                            <div class="main-chat-msg-name">
                                                <a href="#">
                                                    <h5 class="mb-1 text-dark fw-semibold">{{$user->name}}</h5>
                                                </a>
                                                <p class="text-muted mt-0 mb-0 pt-0 fs-13">Donor</p>
                                            </div>
                                        </div>
                                        <form method="post" action="{{ route('password.update') }}">
                                        @csrf
                                        @method('put')
                                        
                                        <div class="form-group">
                                            <label class="form-label">Current Password</label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input name="current_password" required class="input100 form-control" type="password" placeholder="Current Password" autocomplete="current-password">
                                                
                                            </div>
                                            @if ($errors->updatePassword->has('current_password'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->updatePassword->first('current_password') }}</strong>
                                                        </span>
                                                @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input name="password" required class="input100 form-control" type="password" placeholder="New Password" autocomplete="new-password">
                                                
                                            </div>
                                            @if ($errors->updatePassword->has('password'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->updatePassword->first('password') }}</strong>
                                                        </span>
                                                @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input name="password_confirmation" required class="input100 form-control" type="password" placeholder="Confirm Password" autocomplete="new-password">
                                                
                                            </div>
                                            @if ($errors->updatePassword->has('password_confirmation'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->updatePassword->first('password_confirmation') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-primary" type="submit">Update Password</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- <div class="card panel-theme">
                                    <div class="card-header">
                                        <div class="float-start">
                                            <h3 class="card-title">Contact</h3>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="card-body no-padding">
                                        <ul class="list-group no-margin">
                                            <li class="list-group-item d-flex ps-3">
                                                <div class="social social-profile-buttons me-2">
                                                    <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-mail"></i></a>
                                                </div>
                                                <a href="javascript:void(0)" class="my-auto">support@demo.com</a>
                                            </li>
                                            <li class="list-group-item d-flex ps-3">
                                                <div class="social social-profile-buttons me-2">
                                                    <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-globe"></i></a>
                                                </div>
                                                <a href="javascript:void(0)" class="my-auto">www.abcd.com</a>
                                            </li>
                                            <li class="list-group-item d-flex ps-3">
                                                <div class="social social-profile-buttons me-2">
                                                    <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-phone"></i></a>
                                                </div>
                                                <a href="javascript:void(0)" class="my-auto">+125 5826 3658</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Profile</h3>
                                    </div>
                                        <form method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="card-body">
                                        <div class="row">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input required value="{{old('name', $user->name)}}" type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="email_address">Email address</label>
                                            <input required type="email" class="form-control" id="email_address" value="{{$user->email}}" readonly placeholder="Email address">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Contact Number</label>
                                            <input required value="{{$user->phone}}" name="phone" type="number" class="form-control" id="phone" placeholder="Contact number">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        
                                        <!-- <div class="form-group">
                                            <label class="form-label">Website</label>
                                            <input class="form-control" placeholder="http://splink.com">
                                        </div> -->
                                        
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-block btn-primary my-1">Save</button>
                                    </div>

                                        </form>
                                </div>
                                
                               @if(Auth::user()->verification == "not_verified" && $application_status == "none")
                                <!-- Verification -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Profile Verification</h3>
                                    </div>
                                    <form method="POST" action="{{route('donor.verification.apply')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="card-body">
                                        <div class="row">
                                                <div class="form-group">
                                                    <label for="cnic_num">Cnic #</label>
                                                    <input required value="{{old('cnic_num')}}" type="text" class="form-control" name="cnic_num" id="cnic_no">
                                                    @if ($errors->has('cnic_num'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('cnic_num') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="cnic_pic">Cnic Picture</label>
                                            <div class="col-lg-4 col-sm-12 mb-4 mb-lg-0">
                                                <input name="cnic_pic" id="cnic_pic" type="file" class="dropify" data-bs-height="180">
                                            </div>
                                            @if ($errors->has('cnic_pic'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('cnic_pic') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        
                                        <!-- <div class="form-group">
                                            <label class="form-label">Website</label>
                                            <input class="form-control" placeholder="http://splink.com">
                                        </div> -->
                                        
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-block btn-primary my-1">Save</button>
                                    </div>

                                        </form>
                                </div>

                               @elseif(Auth::user()->verification == "not_verified" && $application_status == "pending")

                                <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Profile Verification</h3>
                                        </div>
                                       
                                        
                                        <div class="card-body">
                                           <center><span class="text text-danger text-capitalize">{{trans('messages.verification_application_is_pending')}}<span></center>
                                        </div>
                                        

                                    </div>

                               @endif
                                
                                
                            </div>
                        </div>
                        <!-- ROW-1 CLOSED -->

                    </div>



@endsection

@push('scripts')


<script>
    $(document).ready(function(){
        $('#cnic_no').inputmask('99999-9999999-9');
        
    });

</script>

@endpush