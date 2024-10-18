@if (!empty(session('errorM')))
    <div class="alert alert-danger alert-dismissible alert-alt solid fade show">
         <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Error!</strong> {{session('errorM')}}
    </div>
@endif
@if (!empty(session('error')))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (!empty(session('primary-error')))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{session('primary-error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (!empty(session('success')))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
