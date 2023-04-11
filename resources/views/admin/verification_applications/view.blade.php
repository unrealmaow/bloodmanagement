@extends('admin.layout.app')
@section('content')

<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">View Application</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Application</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Verification Application # {{ $application->id }}</h4>
                </div>
                <div class="card-body">

                    <div class="">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Applicant Name</label>
                            <input readonly class="form-control" value="{{ $application->user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Applicant Type</label>
                            <input readonly class="form-control"
                                value="{{ Str::title($application->user->role) }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Applicant Statis</label>
                            <input readonly class="form-control" value="{{ Str::title($application->status) }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Cnic Num</label>
                            <input readonly class="form-control" value="{{ $application->cnic_num }}">
                        </div>
                        @if($application->applicant_type == "donor")
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Blood Group</label>
                            <input readonly class="form-control" value="{{ $application->bloodgroup->name }}">
                        </div>

                        @endif



                        <div class="demo-gallery card">
                            <div class="card-header">
                                <div class="card-title">Application Attachments</div>
                            </div>
                            <div class="card-body">
                                <ul id="lightgallery" class="list-unstyled row">
                                    <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                        data-responsive="{{ asset($application->cnic_pic_path) }}"
                                        data-src="{{ asset($application->cnic_pic_path) }}"
                                        data-sub-html="<h4>CNIC Image</h4>">
                                        <a href="javascript:void(0)">
                                            <img class="img-responsive br-5"
                                                src="{{ asset($application->cnic_pic_path) }}" alt="Thumb-1">
                                        </a>
                                    </li>

                                    @if($application->applicant_type == "donor")

                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                        data-responsive="{{ asset($application->bloodgroup_pic_path) }}"
                                        data-src="{{ asset($application->bloodgroup_pic_path) }}"
                                        data-sub-html="<h4>Blood Group Certificate</h4>">
                                        <a href="javascript:void(0)">
                                            <img class="img-responsive br-5"
                                                src="{{ asset($application->bloodgroup_pic_path) }}" alt="Thumb-2">
                                        </a>
                        </li>


                        @endif

                                </ul>
                            </div>
                        </div>

                        
                    </div>
                    <div class="text-center">
                        @if($application->status == "pending")
                            <a href="{{ url('/admin/verification/applications/accept') }}/{{ $application->id }}"
                                class="btn btn-success confirm_a">Accept Application</a>
                            &nbsp;
                            <a href="{{ url('/admin/verification/applications/reject') }}/{{ $application->id }}"
                                class="btn btn-danger confirm_a">Reject Application</a>

                        @elseif($application->status == "approved")
                            <a href="{{ url('/admin/verification/applications/reject') }}/{{ $application->id }}"
                                class="btn btn-danger confirm_a">Reject Application</a>
                        @elseif($application->status == "rejected")
                            <a href="{{ url('/admin/verification/applications/accept') }}/{{ $application->id }}"
                                class="btn btn-success confirm_a">Accept Application</a>
                        @endif
                        <div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>



        </div>

        @endsection

        @push('scripts')



        @endpush
