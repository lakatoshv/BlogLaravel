@php
  {{$img = $post->imgurl;}}
@endphp
@extends("layouts.layout")
@section("content")
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<link rel="stylesheet" href="{{ asset('css/post_responsive.css') }}">
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <div class="post-preview">
        <h2 class="post-title">
          {{$post->title}}
        </h2>
        <img style="width: 100%; height: 300px;" src="{{$post->imgurl}}"/>
        <h3 class="post-subtitle">
          {{$post->description}}
        </h3>
      </a>
      <p class="post-meta">
        <span><i class="fa fa-fw fa-eye"></i> {{$post->seen}}</span>  
        <span><i class="fa fa-fw fa-heart"></i> {{$post->likes}}</span>  
      </p>
      <p class="post-meta">Теги:
        @php
        {{$tags = explode(", ", $post->tags);}}
        @endphp
        @foreach($tags as $tag)
          <a href="#">{{$tag}}</a>,  
        @endforeach
      </p>
      <p>{{$post->content}}</p>
      <p class="post-meta">
        Написав: <b><a href="">{{$post->author}}</a><i> 
        {{$post->created_at}}</i></b>
      </p>
    </div>
  </div>
</div>

<div class="container">
  <!-- Similar Posts -->
  <div class="similar_posts">
   

    <!-- Post Comment -->
    <div class="post_comment">
      <div class="post_comment_title">Post Comment</div>
      <div class="row">
        <div class="col-lg-12">
          <div class="post_comment_form_container">
            <form action="#">
              <input type="text" class="comment_input comment_input_name" placeholder="Your Name" required="required">
              <input type="email" class="comment_input comment_input_email" placeholder="Your Email" required="required">
              <textarea class="comment_text" placeholder="Your Comment" required="required"></textarea>
              <button type="submit" class="comment_button">Post Comment</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Comments -->
    <div class="comments">
      <div class="comments_title">Comments <span>(12)</span></div>
      <div class="row">
        <div class="col-lg-12">
          <div class="comments_container">
            <ul class="comment_list">
              <li class="comment">
                <div class="comment_body">
                  <div class="comment_panel d-flex flex-row align-items-center justify-content-start">
                    <div class="comment_author_image">
                      <div>
                        <img src="images/comment_author_1.jpg" alt="">
                      </div>
                    </div>
                    <small class="post_meta">
                      <a href="#">Katy Liu</a>
                      <span>Sep 29, 2017 at 9:48 am</span>
                    </small>
                    <button type="button" class="reply_button ml-auto">Reply</button>
                  </div>
                  <div class="comment_content">
                    <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.</p>
                  </div>
                </div>

                <!-- Reply -->
                <ul class="comment_list">
                  <li class="comment">
                    <div class="comment_body">
                      <div class="comment_panel d-flex flex-row align-items-center justify-content-start">
                        <div class="comment_author_image">
                          <div>
                            <img src="images/comment_author_2.jpg" alt="">
                          </div>
                        </div>
                        <small class="post_meta">
                          <a href="#">Katy Liu</a>
                          <span>Sep 29, 2017 at 9:48 am</span>
                        </small>
                        <button type="button" class="reply_button ml-auto">Reply</button>
                      </div>
                      <div class="comment_content">
                        <p>Nulla facilisi. Aenean porttitor quis tortor id tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus molestie varius tincidunt. Vestibulum congue sed libero ac sodales.</p>
                      </div>
                    </div>

                    <!-- Reply -->
                    <ul class="comment_list">  
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="comment">
                <div class="comment_body">
                  <div class="comment_panel d-flex flex-row align-items-center justify-content-start">
                    <div class="comment_author_image">
                      <div>
                        <img src="images/comment_author_1.jpg" alt="">
                      </div>
                    </div>
                    <small class="post_meta">
                      <a href="#">Katy Liu</a>
                      <span>Sep 29, 2017 at 9:48 am</span>
                    </small>
                    <button type="button" class="reply_button ml-auto">Reply</button>
                  </div>
                  <div class="comment_content">
                    <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
