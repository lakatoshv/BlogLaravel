@php
  {{$img = $post->imgurl;}}
@endphp
@extends("layouts.layout")
@section("title")
  <title>LaravelBlog - {{$post->title}}</title>
@endsection
@section("content")
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<link rel="stylesheet" href="{{ asset('css/post_responsive.css') }}">
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <div class="post-preview">
        <h2 class="post-title text-center">
          {!! $post->title !!}
        </h2>
        <br/>
        @guest
        @elseif($author_id == Auth::user()->id)
        <p class="pull-right">
          <a type="button"
            class="btn btn-sm text-white btn-primary"
            href="{{ url('/posts/edit/'.$post->id) }}">
              <i class="fa fa-edit"></i>
              Редагувати
          </a>
          <button 
            type="button"
            class="btn btn-sm text-white btn-danger"
            id="{{$post->id}}"s
            data-toggle="modal"
            data-target="#delete-post">
              <i class="fa fa-trash"></i>
              Видалити
        </button>
        </p>
        @endguest
        
        <img style="width: 100%; height: 300px;" src="{!! $post->imgurl !!}"/>
        <h3 class="post-subtitle text-center">
          {!! $post->description !!}
        </h3>
      </a>
      <p class="post-meta">
        <span><i class="fa fa-fw fa-eye"></i> {{$post->seen}}</span>  
        <span><i class="fa fa-fw fa-thumbs-up"></i> {{$post->likes}}</span>
        <span><i class="fa fa-fw fa-thumbs-down"></i> {{$post->dislikes}}</span>  
      </p>
      <p class="post-meta">Теги:
        @php
        {{$tags = explode(", ", $post->tags);}}
        @endphp
        @foreach($tags as $tag)
          <a href="#">{{$tag}}</a>,  
        @endforeach
      </p>
      <p class="text-justify">{!! $post->content !!}</p>
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
      <a class="btn btn-xs btn-info" href="{{ url('/posts/'.$post->id.'/like') }}"><span class="fa fa-thumbs-up"></span> Подобається</a>
      <a class="btn btn-sm btn-danger" href="{{ url('/posts/'.$post->id.'/dislike') }}"><span class="fa fa-thumbs-down"></span> Неподобається</a>
    </div>
  </div>
</div>

<div class="container">
  <!-- Similar Posts -->
  <div class="similar_posts">

    <!-- Post Comment -->
    @include("comments.create", ["post_id" => $post->id])

    <!-- Comments -->
    <div class="comments">
      <div class="comments_title">Comments <span>{{count($comments)}}</span></div>
      <div class="row">
        <div class="col-lg-12">
          <div class="comments_container">
            <ul class="comment_list">
              @foreach($comments as $comment)
              <li class="comment">
                <div class="comment_body">
                  <div class="comment_panel d-flex flex-row align-items-center justify-content-start">
                    <span><I class="fa fa-3x fa-user-circle"></I></span>
                    <small class="post_meta">
                      <a href="#" id="author{{$comment->author}}">{{$comment->author}}</a>
                      <span>{{$comment->created_at}}</span>
                    </small>
                    <button type="button" class="reply_button ml-auto">Відповісти</button>
                  </div>
                  <div class="comment_content{{$comment->id}}">
                    <p>{{$comment->comment}}</p>
                  </div>
                  <p class="pull-right">
                    <button 
                      type="button"
                      class="btn btn-sm text-white btn-primary"
                      id="{{$comment->id}}"
                      onclick="setEditCommentValues(this.id)"
                      data-toggle="modal"
                      data-target="#edit-comment">
                        <i class="fa fa-edit"></i>
                        Редагувати
                    </button>
                    <button 
                      type="button"
                      class="btn btn-sm text-white btn-danger"
                      id="{{$comment->id}}"
                      onclick="setDeleteCommentValues(this.id)"
                      data-toggle="modal"
                      data-target="#delete-comment">
                        <i class="fa fa-trash"></i>
                        Видалити
                    </button>
                    <button 
                      type="button"
                      class="btn btn-sm btn-outline-success ml-2">
                        <i class="fa fa-reply"></i>
                        Відповісти
                    </button>
                  </p>
                </div>

                <!-- Reply - ->
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

                    <!- - Reply - ->
                    <ul class="comment_list">  
                    </ul>

                  </li>
                </ul>
                -->
              </li>
              <hr>
              @endforeach

            {{ $comments->links('helpers.pagination') }}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    function setEditCommentValues(id) {
        var author = $("#author" + id).text();
        var comment = $(".comment_content" + id + " p").text();
        $("#edit-id").val(id);
        $("#edit-content").val(comment);
    }
    function setDeleteCommentValues(id) {
        var comment = $(".comment_content" + id + " p").text();
        $("#delete-id").val(id);
    }
</script>
<div id="edit-comment" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Редагувати коментар</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{ url('/edit-comment') }}" enctype='multipart/form-data'>
                {{csrf_field()}}
                @include("layouts.errors")
                <input name="post_id" id="post_id" type="hidden" class="comment_input comment_input_name" required="required" value="{{$post->id}}">
                <input name="comment_id" id="edit-id" type="hidden" class="comment_input comment_input_name" required="required">
                <textarea name="comment" id="edit-content" class="comment_text" placeholder="Your Comment" required="required"></textarea>
                <button type="submit" class="comment_button">Редагувати</button>
              </form>
            </div>
        </div>

    </div>
</div>
<div id="delete-comment" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Видалити цей коментар?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{ url('/delete-comment') }}" enctype='multipart/form-data'>
                {{csrf_field()}}
                @include("layouts.errors")
                <input name="comment_id" id="delete-id" type="hidden" class="comment_input comment_input_name" required="required">
                <button type="submit" class="comment_button">Видалити</button>
              </form>
            </div>
        </div>

    </div>
</div>
<div id="delete-post" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Видалити цей пост?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{ url('/delete-post') }}" enctype='multipart/form-data'>
                {{csrf_field()}}
                @include("layouts.errors")
                <input name="post_id" id="delete-post-id" type="hidden" class="comment_input comment_input_name" required="required" value="{{ $post->id }}">
                <button type="submit" class="post_button">Видалити</button>
              </form>
            </div>
        </div>

    </div>
</div>
@endsection
