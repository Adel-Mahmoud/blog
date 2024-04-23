@extends("layouts.app")
@section("css")
<link href="{{asset('assets/css/dropzone.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/summernote-lite.min.css')}}" rel="stylesheet">
@endsection
@section("content")
<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0">
            <li class="breadcrumb-item active" aria-current="page"> Posts </li>
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
      <form class="forms-sample pt-3 " action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="row"> 
              <div class="col-6">
                  <div class="form-group">
                      <label for="post_picture">
                        <img  src="{{ asset('images/'.$post->post_picture) }}" id="preview" style="width:200px;height:150px;border:2px dashed lightblue;">
                            <input name="post_picture" id="post_picture" class="fileUpload" type="file" value="{{ $post->post_picture }}" multiple hidden/>
                      </label>
                  </div>
              </div>
              <div class="col-6 d-flex align-items-center">
                  <div class="form-group">
                      <label for="post_picture">Post Picture</label>
                  </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                      <label for="exampleInputpostCategory">Category Post</label>
                      <select class="form-control" name="post_category_id" id="exampleInputpostCategory">
                          <option value="">
                            Select Category 
                          </option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}" {{$post->post_category_id == $category->id ? 'selected' : ''}}>
                            {{ $category->category_name }}
                          </option>
                        @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                      <label for="exampleInputpostTitle">Post Title</label>
                      <input type="text" class="form-control" id="exampleInputpostTitle" 
                      placeholder="Post Title" name="post_title" value="{{ $post->post_title }}"/>
                  </div>
              </div>
              <div class="col-12">
                  <div class="form-group">
                      <label for="summernote">Post Content</label>
                      <textarea id="summernote" name="post_content">
                         {{ $post->post_content }}
                      </textarea>
                  </div>
              </div>
          </div>
          <button type="submit" class="btn btn-success mr-2"> Submit </button>
          <button type="reset" class="btn btn-danger">Cancel</button>
      </form>
  </div>
</div>
@endsection
@section("js")
<script src="{{asset('assets/js/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/summernote-lite.min.js')}}"></script>
<script>
    $('#summernote').summernote({
      // placeholder: 'Hello stand alone ui', 
      tabsize: 2,
      height: 320,
    }); 
  </script>
  <script>
    document.getElementById("post_picture").addEventListener("change", (e)=>{document.getElementById("preview").src = URL.createObjectURL(e.target.files[0]);});
  </script>
@endsection