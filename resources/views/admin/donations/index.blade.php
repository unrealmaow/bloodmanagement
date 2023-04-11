
@extends('admin.layout.app')
@section('content')

<div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Donation Requests</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Donation Requests</li>
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
                                                        <th class="wd-15p border-bottom-0">User</th>
                                                        <th class="wd-20p border-bottom-0">Blood Group</th>
                                                        <th class="wd-15p border-bottom-0">Verification</th>
                                                        <th class="wd-10p border-bottom-0">Verified By</th>
                                                        <th class="wd-25p border-bottom-0">Donor</th>
                                                        <th class="wd-25p border-bottom-0">Action</th>
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

function delete_app_confirmation(ev) {
ev.preventDefault();
var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty

swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this Application!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
  if (willDelete) {
        window.location.href = urlToRedirect;
  } else {
    swal("Hmm; Changed Your Mind?");
  }
});
}


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
        ajax: '{!! route('admin.donations.requests.index-data') !!}',
        columns: [
                {data: 'id', name: 'id'},
                {data: 'user.name', name: 'user.name'},
                {data: 'bloodgroup.name', name: 'bloodgroup.name'},
                {data: 'isVerifiedByAdmin', name: 'isVerifiedByAdmin'},
                {data: 'verified_by', name: 'verified_by'},
                {data: 'donor_id', name: 'donor_id'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
    });
})
</script>


@endpush