@extends("layouts.app")
@section("css")
<link href="{{asset('assets/css/summernote-lite.min.css')}}" rel="stylesheet">
@endsection
@section("content")
  <x-HeaderContent title_page="Posts" menu="posts" sub_menu="add"/>
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
        <form class="forms-sample pt-3 " action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row"> 
                <div class="col-6">
                    <div class="form-group">
                        <label for="post_picture">
                          <img id="preview" style="width:200px;height:150px;border:2px dashed lightblue;">
                              <input name="post_picture" id="post_picture" class="fileUpload" type="file" multiple hidden/>
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
                            <option value="{{ $category->id }}" {{$category->id == old('post_category_id') ? 'selected' : ''}}>
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
                        placeholder="Post Title" name="post_title" value="{{old('post_title')}}"/>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="summernote">Post Content</label>
                        <textarea id="summernote" name="post_content">
                        {{old('post_content')}}
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