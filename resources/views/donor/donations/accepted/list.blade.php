
@extends('admin.layout.app')
@section('content')

<div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Accepted Donation Requests</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Accepted Donation Requests</li>
                                </ol>
                            </div>

                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Donation Requests</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="donations_requests_table">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">ID</th>
                                                        <th class="wd-20p border-bottom-0">Blood Group</th>
                                                        <th class="wd-15p border-bottom-0">Admin Verification</th>
                                                        <th class="wd-15p border-bottom-0">Receiver</th>
                                                        <th class="wd-15p border-bottom-0">Receiver Contact</th>
                                                        <th class="wd-25p border-bottom-0">Case Details</th>
                                                    </tr>
                                                </thead>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
</div>

@endsection

@push('scripts')


<script>



</script>



<script>




$(function() {
    $("#donations_requests_table").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        processing: true,
        serverSide: true,
        pageLength: 25,
        order: [ [0, 'desc'] ],
        ajax: '{!! route('donor.donations.accepted_requests_list.index_data') !!}',
        columns: [
                {data: 'id', name: 'id'},
                {data: 'bloodgroup.name', name: 'bloodgroup.name'},
                {data: 'isVerifiedByAdmin', name: 'isVerifiedByAdmin'},
                {data: 'user.name', name: 'user.name'},
                {data: 'user.phone', name: 'user.phone'},
                {data: 'case_details_modal', name: 'case_details_modal', orderable: false, searchable: false},
            ]
    });
})
</script>


@endpush