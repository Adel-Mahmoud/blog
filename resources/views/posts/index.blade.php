@extends("layouts.app")
@section("content")
  <x-HeaderContent title_page="Posts" menu="posts"/>
  <div class="page-header flex-wrap">
    <div class="d-flex">
        <a href="{{ route('posts.create') }}" class="btn btn-sm ml-3 btn-success" style="margin-left:0 !important;">
            Add Post 
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
          Posts 
      </h4>
      <div class="card-body" style="overflow:scroll;">
          <div class="table-responsive">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>#ID</th>
                          <th>Post Picture</th>
                          <th>Post Title</th>
                          <th>Post Category</th>
                          <th>Write By</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    {{-- @if(count($posts) > 0) --}}
                      @php
                        $id = 1; // ($posts->currentPage() - 1) * $posts->perPage() + 1;
                      @endphp
                      @foreach ($posts as $post)
                        <tr>
                            <td>{{ $id++ }}</td>
                            <td class="py-1">
                                <img src="{{ asset('images/' . $post->post_picture) }}" style="width:60px;height:50px;" alt="image" />
                            </td>
                            <td> {{ $post->post_title }} </td>
                            <td> {{ $post->category->category_name }} </td>
                            <td> {{ $post->post_user_name }} </td>
                            <td>{{ $post->created_at->format('Y-m-d') }}</td>
                            <td>
                              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success" >
                                Edit
                              </a> 
                              <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline" class="formDelete">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">
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