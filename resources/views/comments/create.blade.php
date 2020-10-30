<div class="post_comment">
    <div class="post_comment_title">Post Comment</div>
    <div class="row">
      <div class="col-lg-12">
        <div class="post_comment_form_container">
          <form method="post" action="{{ url('/add-comment') }}" enctype='multipart/form-data'>
            {{csrf_field()}}
            @include("layouts.errors")
            <input name="post_id" id="post_id" type="hidden" class="comment_input comment_input_name" required="required" value="{{$post_id}}">
            <textarea name="comment" id="comment" class="comment_text" placeholder="Your Comment" required="required"></textarea>
            <button type="submit" class="comment_button">Додати коментар</button>
          </form>
        </div>
      </div>
    </div>
  </div>