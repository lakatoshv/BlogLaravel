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