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
          
          <h1 class="text-center">Reply</h1>
          <br>
          <ul class="comments">
          @if(count($comments) > 0)
            @foreach($comments as $comment)
              <li> 
                <div class="comment">
                  @php
                    echo "<b>".$comment->name ."</b>
                    <span>". $timeHelper->timeAgo($comment->created_at) . "</span><p>" . $comment->comment . '</p>';
                  @endphp
                    <a href="{{ route('site.reply',$comment->id) }}">Reply</a>
                    {{ \App\Models\Comment::where('parent_id', $comment->id)->count() }}
                </div>
              </li>
            @endforeach
          @else
            {{ "No Comment" }}
          @endif
          </ul>
          <br>
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
            <input name="post_id" value="{{ $comment->post_id }}" hidden>
            <input name="parent_id" value="{{ $id }}" hidden>
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
