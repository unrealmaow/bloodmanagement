@extends('admin.layout.app')
@section('content')

<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">View Donation Request</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Donation Request</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Donation Request # {{ $donation->id }}</h4>
                </div>
                <div class="card-body">

                    <div class="">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Receiver Name</label>
                            <input readonly class="form-control" value="{{ $donation->user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Blood Group</label>
                            <input readonly class="form-control"
                                value="{{ Str::title($donation->bloodgroup->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Donor</label>
                            <input readonly class="form-control" value="something to be here">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Request Status</label>
                            <input readonly class="form-control" value="{{ $donation->status }}">
                        </div>
                        

                        <div class="demo-gallery card">
                            <div class="card-header">
                                <div class="card-title">Request Attachments</div>
                            </div>
                            <div class="card-body">
                                <ul id="lightgallery" class="list-unstyled row">
                                    <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                        data-responsive="{{ asset($donation->proof_pic_path) }}"
                                        data-src="{{ asset($donation->proof_pic_path) }}"
                                        data-sub-html="<h4>Donation Request Case Proof</h4>">
                                        <a href="javascript:void(0)">
                                            <img class="img-responsive br-5"
                                                src="{{ asset($donation->proof_pic_path) }}" alt="Thumb-1">
                                        </a>
                                    </li>

                                   

                                </ul>
                            </div>
                        </div>

                        
                    </div>
                    <div class="text-center">
                        @if($donation->status == "pending")
                            <a href="{{ url('/admin/donations/requests/accept') }}/{{ $donation->id }}"
                                class="btn btn-success confirm_a">Approve Request</a>
                            &nbsp;
                            <a href="{{ url('/admin/donations/requests/reject') }}/{{ $donation->id }}"
                                class="btn btn-danger confirm_a">Reject Request</a>

                        @elseif($donation->status == "approved")
                            <a href="{{ url('/admin/donations/requests/reject') }}/{{ $donation->id }}"
                                class="btn btn-danger confirm_a">Reject Request</a>
                        @elseif($donation->status == "rejected")
                            <a href="{{ url('/admin/donations/requests/accept') }}/{{ $donation->id }}"
                                class="btn btn-success confirm_a">Approve Request</a>
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
