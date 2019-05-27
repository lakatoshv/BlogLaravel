@extends("layouts.layout")
@section("title")
  <title>LaravelBlog - Головна</title>
@endsection
@section("content")

<style>
    .left li {
        float: left;
        vertical-align: middle;
        margin-right: 15px;
    }
    .search {
        background-color: #e9ecef;
        border: 1px solid #ced4da;
    }
    .input-group-text {
        border: none;
    }
</style>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-10 col-md-10 mx-auto">
      <div class="input-group md-form form-sm form-2 pl-0 col-5">
        <input class="form-control search" type="text" placeholder="Search" aria-label="Search" name="search" id="search">
        <button class="input-group-append" type="submit" id="search-btn">
          <span class="input-group-text"><i class="fa fa-search text-grey" aria-hidden="true"></i></span>
        </button>
      </div>
      <ul class="list-inline">
          <li>
            <a href="{{ url('/myPosts?display=list') }}" style="float: left; padding-right: 15px;">
              <span class="fa fa-list"></span>
            </a>
          </li>
          <li>
            <a href="{{ url('/myPosts?display=grid') }}">
              <span class="fa fa-th"></span>
            </a>
          </li>
        </ul>
        <div class="clearfix"></div>
        @if ( Auth::check() && Auth::user()->role == "admin" )
          <div class="post-preview">
            <a href="{{ url('/posts/create') }}">Написати пост</a>
          </div>
        @endif
      @foreach($posts as $post)
        <div class="post-preview{{$post->id}}">
          <a href="{{ url('/posts/'.$post->id) }}">
            <h2 class="post-title">
              {{html_entity_decode($post->title)}}
            </h2>
            @guest
            @elseif($post->author_id == Auth::user()->id)
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
                id="{{$post->id}}"
                onclick="setDeletePostValues(this.id)"
                data-toggle="modal"
                data-target="#delete-post">
                  <i class="fa fa-trash"></i>
                  Видалити
            </button>
            </p>
            @endguest
            <img style="width: 100%; height: 300px;" src="{!! $post->imgurl !!}"/>
            <h3 class="post-subtitle">
              {!! $post->description !!}
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

<script>
    function setDeletePostValues(id) {
      debugger
        var postTitle = $(".post-preview" + id + " h2").text();
        $("#delete-post-id").val(id);
        document.getElementById("delete-post-title").textContent=postTitle;
    }

    function cheked(select) {
        // берём значение из select и что-то с ним делаем
        return select.val();
    };

    /* сортування */
    $("#sorting").click(function () {
      debugger
        var value_sort = cheked($("#sort-by"));
        var type_sort = cheked($("#order-by"));
        document.cookie = "sort=" + value_sort;
        document.cookie = "type_sort=" + type_sort;
        location.href = '{{url("myPosts")}}' + '/sortBy/' + value_sort  + '/orderBy/' + type_sort;
    });

    $("#search-btn").click(function () {
        var search = $("#search").val();
        if (search !== "") {
          location.href = '{{url("myPosts")}}' + '/search/' + search;
        }
        
    });
</script>

<div id="delete-post" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Видалити цей пост?</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p id="delete-post-title">Title zxczxc xczcxz</p>
              <form method="post" action="{{ url('/delete-post') }}" enctype='multipart/form-data'>
                {{csrf_field()}}
                @include("layouts.errors")
                <input name="post_id" id="delete-post-id" type="hidden" class="comment_input comment_input_name" required="required">
                <button type="submit" class="post_button">Видалити</button>
              </form>
            </div>
        </div>

    </div>
</div>
@endsection