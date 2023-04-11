@extends('receiver.layout.app')
@section('content')
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Request Donation</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Request Donation</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <form method="post" action="{{ route('receiver.donations.store_request') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Request New Donation</h4>
                        </div>
                        <div class="card-body">

                            <div class="">
                                {{-- <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Applicant Name</label>
                                <input name="" class="form-control">
                            </div> --}}

                                <div class="form-group">
                                    <label class="form-label"> Blood Group</label>
                                    <select required name="blood_group" class="form-control select2-show-search form-select"
                                        data-placeholder="Choose one">
                                        <option label="Choose one"></option>
                                        @foreach ($blood_groups as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('blood_group'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('blood_group') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Case Details</h3>
                                            </div>
                                            <div class="card-body">
                                                <textarea required name="case_details" class="content"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="case_proof">Case Proof Pic</label>
                                    <div class="col-lg-4 col-sm-12 mb-4 mb-lg-0">
                                        <input required name="case_proof" id="case_proof" type="file" class="dropify"
                                            data-bs-height="180">
                                    </div>
                                    @if ($errors->has('case_proof'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('case_proof') }}</strong>
                                        </span>
                                    @endif
                                </div>


                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Request Donation</button>
                                <br><br>
                                <span class="text-danger">Please Note That Your Request Will Be First Verified By An Admin.</span>
                            </div>
                        </div>

                    </div>



                </div>


            </div>

        </form>
    @endsection
