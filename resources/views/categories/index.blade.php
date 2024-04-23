@extends("layouts.app")

@section("content")
<x-HeaderContent title_page="Categories" menu="categories"/>
<div class="page-header flex-wrap">
    <div class="d-flex">
        <a href="{{ route('categories.create') }}" class="btn btn-sm ml-3 btn-success" style="margin-left:0 !important;">
            Add Category 
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
        Categories 
    </h4>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#ID</th>
                      <th>Category Name</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                {{-- @if(count($users) > 0) --}}
                  @php
                    $id = 1; // ($categories->currentPage() - 1) * $categories->perPage() + 1;
                  @endphp
                  @foreach ($categories as $category)
                    <tr>
                        <td>{{ $id++ }}</td>
                        <td> {{ $category->category_name }} </td>
                        <td>{{ $category->created_at->format('Y-m-d') }}</td>
                        <td>
                          <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm" >
                            Edit
                          </a> 
                          <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline" class="formDelete">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-sm">
                                  Delete
                              </button>
                          </form>
                        </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection