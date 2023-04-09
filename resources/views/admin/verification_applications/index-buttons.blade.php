<a href="{{ url('/admin/verification/applications/view')}}/{{$id}}" class="btn btn-xs btn-primary" title="View"><i class="fa fa-eye"></i></a>
<form method="POST" action="{{url('/admin/applications/delete')}}" accept-charset="UTF-8" class="form-inline"
    style="display: inline-block">
    
    @csrf
    <button class="btn btn-icon  btn-danger" type="button">
        <i class="fe fe-trash"></i>
    </button>
</form>