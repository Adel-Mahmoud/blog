<div>
  <x-HeaderContent title_page="Users" menu="users"/>
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul style="text-align:center;list-style:none;">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  @if (session('success'))
  <div class="alert alert-success text-center">
      {{ session('success') }}
  </div>
  @endif
  @if (session('error'))
  <div class="alert alert-danger text-center">
      {{ session('error') }}
  </div>
  @endif
  @if( $add_at || $edit_at || $delete_at )
  @else
  @endif
  <div class="card">
    <div class="card-body">
        <form class="forms-sample pt-3" method="POST">
            <div class="row">
                <input value="{{ $id }}" type="hidden">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" 
                        placeholder="Name" wire:model="name" value="{{ $name }}"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3"
                            placeholder="Email" wire:model="email" value="{{ $email }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4"
                            placeholder="Password" wire:model="password" value="{{ $password }}"/>
                    </div> 
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleSelectConfirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleSelectConfirmPassword"
                          wire:model="confirm_password"  placeholder="Confirm Password" />
                    </div>
                </div>
            </div>    
            <div class="text-center">
              <button wire:click.prevent="store" class="btn btn-success mr-2"> ADD </button>
              <button wire:click.prevent="update" class="btn btn-info mr-2"> UPDATE </button>
              <button wire:click.prevent="destroy" class="btn btn-danger mr-2"> DELETE </button>
              <button wire:click.prevent="resetData" class="btn btn-warning">RESET</button>
            </div>
        </form>
    </div>
  </div>
  <button wire:click="create" class="btn btn-primary">Add</button>
  <div class="card">
      <h4 class="card-title bg-color p-3 text-light rounded-top">
          Users 
      </h4>
      <div class="card-body">
          <div class="d-flex align-items-center">
            <input type="search" wire:model.live="search" wire:input="search" class="form-control w-25 my-3" placeholder="Search ...">
          </div>
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
                              <button wire:click="edit( {{ $user->id }} )" class="btn btn-success btn-sm" >
                                Edit
                              </button> 
                              <button wire:click="edit( {{ $user->id }} )" class="btn btn-danger btn-sm" >
                                Delete 
                              </button> 
                            </td>
                        </tr>
                      @endforeach
                    {{-- @else
                      <tr><td colspan="4" style="text-align: center;">لا يوجد بيانات</td></tr>
                    @endif --}}
                  </tbody>
              </table>
              <div>
                {{ $users->links() }}
              </div>
          </div>
      </div>
  </div>
</div>
