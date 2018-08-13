@extends("layouts.layout")
@section("content")
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($posts as $post)
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              {{$post->title}}
            </h2>
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
        </div>
          <p class="post-meta">
            Написав: <b>Vital_L<i> 
            {{$post->created_at}}</i></b>
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