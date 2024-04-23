<div>
  <div class="page-header flex-wrap">
      <div class="d-flex">
          <a href="{{ route('tags.create') }}" class="btn btn-sm ml-3 btn-success" style="margin-left:0 !important;">
              Add Tag 
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
          Tags 
      </h4>
      <div class="card-body">
          <div class="d-flex align-items-center">
            <input type="search" wire:model.live="search" wire:input="search" class="form-control w-25 my-3" placeholder="Search ...">
            <button wire:click="mySearch" class="btn btn-success btn-sm ml-2" style="height:35px !important;">Search</button>
          </div>
          
          <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Tag Name</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  {{-- @if(count($users) > 0) --}}
                    @php
                      $id = 1; // ($tags->currentPage() - 1) * $tags->perPage() + 1;
                    @endphp
                    @foreach ($tags as $tag)
                      <tr>
                          <td>{{ $id++ }}</td>
                          <td> {{ $tag->tag_name }} </td>
                          <td>{{ $tag->created_at }}</td>
                          <td>
                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-success btn-sm" >
                              Edit
                            </a> 
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: inline" class="formDelete">
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
              <div>
                {{ $tags->links() }}
              </div>
          </div>
      </div>
  </div>
</div>