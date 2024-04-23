@extends("layouts.app")

@section("content")
<div class="page-header flex-wrap">
    <div class="d-flex">
        <a href="{{ route('users.create') }}" class="btn btn-sm ml-3 btn-success" style="margin-left:0 !important;">
            Add User 
        </a>

        <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
            <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
            <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
    </div>
    <h3 class="mb-0">
    </h3>
</div>
<div class="card">
    <h4 class="card-title bg-color p-3 text-light rounded-top">
        Users 
    </h4>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>User Picture</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  {{-- @if(count($users) > 0) --}}
                    @php
                      $id = 1; // ($users->currentPage() - 1) * $users->perPage() + 1;
                    @endphp
                    @foreach ($users as $user)
                      <tr>
                          <td>{{ $id++ }}</td>
                          <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                          </td>
                          <td> {{ $user->name }} </td>
                          <td> {{ $user->email }} </td>
                          
                          <td>{{ $user->created_at->format('Y-m-d') }}</td>
                          <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm" >
                              Edit
                            </a> 
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline" class="formDelete">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                          </td>
                      </tr>
                    @endforeach
                  {{-- @else
                    <tr><td colspan="4" style="text-align: center;">لا يوجد بيانات</td></tr>
                  @endif --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection