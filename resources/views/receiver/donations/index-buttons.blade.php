

@if($status == "pending" || $status == "rejected")

<span class="badge bg-warning-gradient badge-sm  me-1 mb-1 mt-1">Action Not Available For This Donation</span>

@else


<a class="modal-effect btn btn-primary-light d-grid mb-3" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#donor_details_{{$id}}">View Donor Details</a>
                                    
  
<div class="modal fade" id="donor_details_{{$id}}">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p><b>Donor Name:</b> {{App\Models\User::find($donor_id)->name}}</p>
                <p><b>Donor Contact:</b> {{App\Models\User::find($donor_id)->phone}}</p>
                <p class="text-danger"><b>Note:</b> Please Mention Our Website Name While Calling Donor.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




@endif