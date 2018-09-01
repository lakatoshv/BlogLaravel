@extends("layouts.layout")
@section("title")
  <title>LaravelBlog - Головна</title>
@endsection
@section("content")
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-10 col-md-10 mx-auto">
      @foreach($posts as $post)
        <div class="post-preview">
          <a href="{{ url('/posts/'.$post->id) }}">
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
            <span><i class="fa fa-fw fa-thumbs-up"></i> {{$post->likes}}</span>
            <span><i class="fa fa-fw fa-thumbs-down"></i> {{$post->dislikes}}</span>
            @php 
            {{$comments = DB::table("comments")->where("post_id", $post->id)->get();}}
            @endphp 
            <span><i class="fa fa-fw fa-comment"></i>{{count($comments)}}</span>
          </p>
          <p class="post-meta">Теги:
            @php
            {{$tags = explode(", ", $post->tags);}}
            @endphp
            @foreach($tags as $tag)
              <a href="#">{{$tag}}</a>,  
            @endforeach
          </p>
          <p class="post-meta">
            Написав: <b><a href="">{{$post->author}}</a><i> 
            @php
            {{
              $date = date_create($post->created_at);
              $date = date_format($date, 'd.m.Y');
            }}
            @endphp
            {{$date}}</i></b>
          </p>
        </div>
        <hr>
      @endforeach
      
      <!-- Pager -->
      <div class="clearfix"> 
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>
  </div>
</div>
@endsection