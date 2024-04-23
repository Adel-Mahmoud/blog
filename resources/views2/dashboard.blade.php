@extends("layouts.app")

@section("content")
<div class="page-header flex-wrap">
    <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Your
            web analytics dashboard template.</span>
    </h3>
    <div class="d-flex">
        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
            <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
        <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
            <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
            <a href="{{ route('users.add') }}" class="btn btn-sm ml-3 btn-success" style="margin-left:0 !important;">
                Add User 
            </a>
    </div>
</div>

<div class="row">
    <div class="col-6 stretch-card grid-margin">
        <div class="card bg-warning">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <p class="mb-0 color-card-head">Courses</p>
                        <br>
                        <h2 class="text-white">12
                        </h2>
                    </div>
                    <i class="card-icon-indicator mdi mdi-view-dashboard bg-inverse-icon-warning"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 stretch-card grid-margin">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <p class="mb-0 color-card-head">Levels</p>
                        <br>
                        <h2 class="text-white">30
                        </h2>
                    </div>
                    <i class="card-icon-indicator mdi mdi-folder bg-inverse-icon-danger"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 stretch-card grid-margin">
        <div class="card bg-primary">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <p class="mb-0 color-card-head">Videos</p>
                        <br>
                        <h2 class="text-white">216
                        </h2>
                    </div>
                    <i class="card-icon-indicator mdi mdi-video-vintage bg-inverse-icon-primary"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 stretch-card grid-margin">
        <div class="card bg-success">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <p class="mb-0 color-card-head">Users</p>
                        <br>
                        <h2 class="text-white">5</h2>
                    </div>
                    <i
                        class="card-icon-indicator mdi mdi-account-group bg-inverse-icon-success"></i>
                </div>                                   
            </div>
        </div>
    </div>
</div>
@endsection