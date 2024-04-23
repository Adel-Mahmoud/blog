<!DOCTYPE html>
<html>
  <head>
    <title> Blog Posts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=.3">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/site-style.css')}}" type="text/css"/>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('site.index') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                Single Post
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                About 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                Contact 
              </a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
    
    <div class="warper bg-light">
      
      <div class="container-floid pt-5">
        <div class="container">
          
          @if(!empty($post))
          <div class="post-details">
            <div class="text-center">
              <h1>{{ $post->post_title }}</h1>
              <b class="post-min-details">Category - {{ $post->category->category_name }}</b>
              <img class="img-fluid w-100 py-3" src="{{ asset('images/'.$post->post_picture) }}" style="aspect-ratio:16/9;" alt="First slide">
              <div class="post-min-details float-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2S7.5 4.019 7.5 6.5M20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1z"/></svg>
                <span>{{ $post->post_user_name }}</span>
              </div>
              <div class="post-min-details">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="currentColor" fill-opacity="0.15" d="M712 304c0 4.4-3.6 8-8 8h-56c-4.4 0-8-3.6-8-8v-48H384v48c0 4.4-3.6 8-8 8h-56c-4.4 0-8-3.6-8-8v-48H184v136h656V256H712z"/><path fill="currentColor" d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32m-40 656H184V460h656zm0-448H184V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128z"/></svg>
                <span>{{ $post->created_at }}</span>
              </div>
            </div>
            
            <div class="post-content p-3 mt-3" style="background:#fff;">
              @php echo htmlspecialchars_decode($post->post_content); @endphp 
            </div>
          </div>

          @endif
          
        <ul class="comments">
        @if(count($comments) > 0)
          @foreach($comments as $comment)
            <li> 
              <div class="comment">
                  @php echo htmlspecialchars_decode("<b>". $comment->name . "</b><p>" . $comment->comment . '</p>'); @endphp
                  <span>Reply</span>
              </div>
            </li>
          @endforeach
            {{-- <li>test comments</li> --}}
        @else
          {{ "No Comment" }}
        @endif
        </ul>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('site.store') }}" method="POST" class="tm-contact-form ">                                
            @csrf
            <input name="post_id" value="{{ $post->id }}" hidden>
            <div class="row">
              <div class="form-group col-12">
                  <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Name"  required/>
              </div>
              <div class="form-group col-12">
                  <textarea id="contact_message" name="comment" class="form-control" rows="6" placeholder="Message" required>
                    {{old('comment')}}
                  </textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>                          
        </form>   
        <br>
        </div>
      </div>
      
    </div>

    <footer>
      <div class="bg-dark p-2">
        <p class="text-light text-center">
          Copyright (C) 2024 All rights by : Adel Mahmoud 
        </p>
      </div>
    </footer>
    <script src="./assets/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./assets/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./assets/js/script.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      
    </script>
  </body>
</html>
