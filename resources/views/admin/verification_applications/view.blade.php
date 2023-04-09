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
                    <h4 class="card-title">Verification Application # {{$application->id}}</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Applicant Name</label>
                                <input readonly class="form-control" value="{{$application->user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Applicant Type</label>
                                <input readonly class="form-control" value="{{Str::title($application->user->role)}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Applicant Statis</label>
                                <input readonly class="form-control" value="{{Str::title($application->status)}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Cnic Num</label>
                                <input readonly class="form-control" value="{{$application->cnic_num}}">
                            </div>

                           

                            <div class="demo-gallery card">
                            <div class="card-header">
                                <div class="card-title">Cnic Pic</div>
                            </div>
                            <div class="card-body">
                                <ul id="lightgallery" class="list-unstyled row">
                                    <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0" data-responsive="../assets/images/media/1.jpg" data-src="../assets/images/media/1.jpg" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                        <a href="javascript:void(0)">
                                            <img class="img-responsive br-5" src="{{asset('/storage/'.$application->cnic_pic_path)}}" alt="Thumb-1">
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                            
                            
                        </div>
                        <button class="btn btn-primary mt-4 mb-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>



</div>

@endsection

@push('scripts')



@endpush
