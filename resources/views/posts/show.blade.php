@extends("layouts.layout")
@section("content")
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
        Написав: <b>{{$post->author}}<i> 
        {{$post->created_at}}</i></b>
      </p>
    </div>
  </div>
</div>
@endsection