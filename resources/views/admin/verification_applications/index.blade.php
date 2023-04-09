
@extends('admin.layout.app')
@section('content')

<div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Data Table</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                                </ol>
                            </div>

                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Responsive DataTable</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="applications_table">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">ID</th>
                                                        <th class="wd-15p border-bottom-0">User</th>
                                                        <th class="wd-20p border-bottom-0">Role</th>
                                                        <th class="wd-15p border-bottom-0">Status</th>
                                                        <th class="wd-10p border-bottom-0">Approved By</th>
                                                        <th class="wd-25p border-bottom-0">Cnic Num</th>
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
$(function() {
    $("#applications_table").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        processing: true,
        serverSide: true,
        pageLength: 25,
        order: [ [0, 'desc'] ],
        ajax: '{!! route('admin.verification.applications.index-data') !!}',
        columns: [
                {data: 'id', name: 'id'},
                {data: 'user.name', name: 'user.name'},
                {data: 'user.role', name: 'user.role'},
                {data: 'status', name: 'status'},
                {data: 'approved_by', name: 'approved_by'},
                {data: 'cnic_num', name: 'cnic_num'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
    });
})
</script>


@endpush