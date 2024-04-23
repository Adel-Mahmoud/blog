@extends("layouts.app")

@section("content")
<div class="page-header flex-wrap">
    <div class="d-flex">
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
        Comments 
    </h4>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Comment</th>
                      <th>Post Title</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @php
                    $id = 1; // ($comments->currentPage() - 1) * $comments->perPage() + 1;
                  @endphp
                  @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $id++ }}</td>
                        <td> {{ $comment->name }} </td>
                        <td> {{ $comment->email}} </td>
                        <td> {{ $comment->subject}} </td>
                        <td> {{ $comment->comment}} </td>
                        <td> {{ $comment->post->post_title }} </td>
                        <td>{{ $comment->created_at->format('Y-m-d') }}</td>
                        <td>
                          <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline" class="formDelete">
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