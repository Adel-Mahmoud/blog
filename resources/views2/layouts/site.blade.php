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
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./single.html">
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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
      
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="./assets/img/tm-home-img.jpg" alt="First slide">
          </div>
        </div>
      </div>
    
    </header>
    
    <div class="warper bg-light">
      
      <h3 class="text-center pt-5">
        All Posts
      </h3>
      
      <div class="container-floid pt-5">
        <div class="container">
          
          <div class="posts">
            <div class="row">
              @if(count($posts) > 0)
                @foreach($posts as $post)

                  <div class="col-12 col-md-6 mb-5">
                    <div class="card">
                    <a href="{{ route('site.show', $post->id) }}" class="text-dark">
                      <div class="row">
                        <div class="col-12 col-lg-6">
                          <img class="card-img-top w-100 h-100" style="aspect-ratio:16/12;" src="{{ asset('images/'. $post->post_picture) }}" alt="Card image cap">
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="card-body">
                            <h5 class="card-title">{{ $post->post_title }}</h5>
                            <p class="card-text">{{ $post->post_excerpted }}</p>
                            <div class="d-flex justify-content-between">
                              <div class="post-min-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2S7.5 4.019 7.5 6.5M20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1z"/></svg>
                                <span>Adel</span>
                              </div>
                              <div class="post-min-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="currentColor" fill-opacity="0.15" d="M712 304c0 4.4-3.6 8-8 8h-56c-4.4 0-8-3.6-8-8v-48H384v48c0 4.4-3.6 8-8 8h-56c-4.4 0-8-3.6-8-8v-48H184v136h656V256H712z"/><path fill="currentColor" d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32m-40 656H184V460h656zm0-448H184V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128z"/></svg>
                                <span>2024/10/15</span>
                              </div>
                              <div class="post-min-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M9 22a1 1 0 0 1-1-1v-3H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6.1l-3.7 3.71c-.2.19-.45.29-.7.29z"/></svg>
                                <span>5</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>  
                    
                    </div>
                  </div>
                    
                @endforeach
              @endif

            </div>
          </div>
          
          <h1 class="text-center">About</h1>
          
          <div class="container-about-section my-5">
            <div class="about-section">
              <div class="inner-container">
                <h1>About Us</h1>
                <p class="text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi neque voluptates sit deleniti autem error eos totam nisi neque.
                </p>
                <div class="skills">
                  <span>Web Design</span>
                  <span>Photoshop & Illustrator</span>
                  <span>Coding</span>
                </div>
              </div>
            </div>
          </div>

          <h1 class="text-center">Contact</h1>

          <div class="contact my-5">
            <div class="row">
              <div class="col-12 col-lg-6">
                <img src="./assets/img/tm-about.jpg" class="w-100 h-100" alt="" />
              </div>
              <div class="col-12 col-lg-6 d-flex align-items-center mt-3">
                <form method="POST" action="">
                <div class="form-group">
                  <div class="row">
                    <div class="col mb-3">
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="col mb-3">
                      <input type="text" class="form-control" id="exampleInputName" placeholder="Name">
                    </div>
                    <div class="col-12 mb-3">
                      <input type="text" class="form-control" id="exampleInputSubject" placeholder="Subject">
                    </div>
                    <div class="col-12">
                      <textarea id="exampleInputMessage" class="form-control text-left" rows="8">
                        
                      </textarea>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              </div>
            </div>
          </div>
          
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