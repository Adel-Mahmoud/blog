@extends('layouts.site')       
@section('content')
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
          @php
            echo "<b>".$comment->name ."</b>
            <span>". $timeHelper->timeAgo($comment->created_at) . "</span><p>" . $comment->comment . '</p>';
          @endphp
            <a href="{{ route('site.reply',$comment->id) }}">Reply</a>
            {{ \App\Models\Comment::where('parent_id', $comment->id)->count() }}
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
@endsection
