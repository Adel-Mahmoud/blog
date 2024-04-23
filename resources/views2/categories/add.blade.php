@extends("layouts.app")
@section("content")
<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0">
            <li class="breadcrumb-item active" aria-current="page"> Categories </li>
            <li class="breadcrumb-item">
              <a class="text-color" href="#">
                Add
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
      <form class="forms-sample pt-3" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
          <div class="form-inputs">
            @csrf
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <input type="text" class="form-control"
                        placeholder="Category Name" name="category_name[]" value="" placeholder="Category Name"/>
                    </div>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                  <div class="btn btn-sm btn-danger">×</div>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success mr-2"> Submit </button>
          <button type="button" class="btn btn-info mr-2">Add Row</button>
          <button type="reset" class="btn btn-danger">Cancel</button>
      </form>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    // Add Row button click event
    $(".btn-info").click(function(){
        var newRow = `<div class="row">
                         <div class="col-10">
                             <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Category Name" name="category_name[]" value="" />
                             </div>
                         </div>
                         <div class="col-2 d-flex justify-content-center align-items-center">
                             <div class="btn btn-sm btn-danger remove-row">×</div>
                         </div>
                     </div>`;
        $(".form-inputs").append(newRow);
    });

    // Remove Row button click event
    $(".form-inputs").on("click", ".remove-row", function(){
        $(this).closest('.row').remove();
    });
});
</script>
@endsection