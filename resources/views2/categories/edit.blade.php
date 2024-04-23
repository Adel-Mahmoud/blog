@extends("layouts.app")
@section("content")
<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0">
            <li class="breadcrumb-item active" aria-current="page"> Categories </li>
            <li class="breadcrumb-item">
              <a class="text-color" href="#">
                Edit
              </a>
            </li>
        </ol>
    </nav>
    <h3 class="page-title">
    </h3>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
  <div class="card-body">
      <form class="forms-sample pt-3" action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="row">
              <div class="col-6">
                  <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" 
                      placeholder="Category Name" name="category_name" value="{{ $category->category_name }}"/>
                  </div>
              </div>
          </div>
          <button type="submit" class="btn btn-success mr-2"> Submit </button>
          <button type="reset" class="btn btn-danger">Cancel</button>
      </form>
  </div>
</div>
@endsection