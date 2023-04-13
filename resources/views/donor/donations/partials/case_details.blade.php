<a class="modal-effect btn btn-danger-light d-grid mb-3" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#case_details_{{$id}}">Case Details</a>
                                    
  
<div class="modal fade" id="case_details_{{$id}}">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {!! $case_details !!}
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

