@extends("layouts.layout")
@section("title")
  <title>LaravelBlog - Редагувати пост</title>
@endsection
@section("content")
<div class="container">
  <div class="row" data-ref="container">
    <div class="col-lg-12">
      <h2 class="text-center" id="form-header">Редагувати пост</h2>
      <form method="post" action="{{ url('/update') }}" enctype='multipart/form-data'>
        {{csrf_field()}}
        @include("layouts.errors")
        <input type="hidden" name="id" id="post-id" class="form-control" value="{{ $post->id }}">
        <div class="form-group">
          <label for="title" tag="" class="optional">Тема посту:</label>
          <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="form-group">
          <label for="description" tag="" class="optional">Короткий опис:</label>
          <textarea name="description" id="description" class="form-control" rows="10" cols="80">{!! $post->description !!}</textarea>
        </div>
        <div class="form-group">
          <label for="content" tag="" class="optional">Пост:</label>
          <textarea name="content" id="content" class="form-control" rows="24" cols="80">{!! $post->content !!}</textarea>
        </div>
        <label for="content" tag="" class="optional">Основна картинка</label>
        <!--
        <div class="radio">
          <label>
            <input class="form-check-input" type="radio" name="type" id="upload" value="upload">
            <label for="upload">Вибрати файл з комп'ютера</label>
          </label>
          <div class="upload" style="display: none;">
            <div id="objects">
              <div class="form-group" id="add-image1" >
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <label for="gallery_img" tag="" class="optional">Картинка:</label>
                <dd>
                  <input type="hidden" name="MAX_FILE_SIZE" value="2097152" id="MAX_FILE_SIZE">
                  <input type="file" name="gallery_img" id="gallery_img" class="form-control">
                </dd>
              </div>
            </div>
            <p id="add-input" class="btn btn-default">Додати ще одну картинку</p>
          </div>
        </div>
        <div class="radio">
          <label>
            <input class="form-check-input" type="radio" name="type" id="addurl" value="addurl">
            <label for="addurl">Вказати URL-адресу</label>
          </label>
          <div class="addurl" style="display: none;"> 
            <div class="form-group">
              <label for="img_url" tag="" class="optional">URL-адреса:</label>
              <input type="text" name="img_url" id="img_url" value="" class="form-control">
              <p>Наприклад: https://some_image.com/example.jpg</p>
            </div>
          </div>
        </div>
        -->
        <div class="addurl"> 
          <div class="form-group">
            <label for="img_url" tag="" class="optional">URL-адреса:</label>
            <input type="text" name="img_url" id="img_url" class="form-control" value="{{ $post->imgurl }}">
            <p>Наприклад: https://some_image.com/example.jpg</p>
          </div>
        </div>
        <div class="form-group">
          <label for="tags" tag="" class="optional">Теги:</label>
          <input type="text" name="tags" id="tags" class="form-control" value="{{ $post->tags }}">
        </div>
        <div class="form-group">
          <label for="alias" tag="" class="optional">Тема посту на англійській і без пропусків(посилання):</label>
          <input type="text" name="alias" id="alias" class="form-control" value="{{ $post->alias }}">
        </div>
        <input type="submit" name="submit" id="submit" value="Зберегти" class="btn btn-default">
      </form>
    </div>
  </div>
</div>
<script>
    $("input[name=type]").click(function() {
        if($('input[name=type]:checked').val() == "upload"){
            $(".addurl").hide();
            $(".upload").show();
        }
        else if($('input[name=type]:checked').val() == "addurl"){
            $(".addurl").show();
            $(".upload").hide();
        }
    });
    $(document).ready(
    function(){
        //додавання нової картинки
        var count_input = 1;
        $("#add-input").click(function(){
            count_input++;
            $("<div id='add-image"+count_input+"' class='form-group'><input type='hidden' name='MAX_FILE_SIZE' value='2000000'/><input type='file' class='form-control' name='gallery_img[]'/><a class='delete-input' rel='"+count_input+"'>Видалити</a></div>").fadeIn(300).appendTo("#objects"); 
        });
        //видалення картинки
        $(document).on("click", ".delete-input", function(){
            var rel = $(this).attr("rel");
            $("#add-image"+rel).fadeOut(300, function(){
                $("#add-image"+rel).remove();
            });
        });
        $("td.delete").click(function() {
            document.getElementById('delete_id').value = $('div.id').html();
        });
        $("[data-toggle=tooltip]").tooltip();
    }
);
</script>
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<script>
  tinymce.init({ 
    selector:'textarea',
     plugins: "media autolink autoresize autoresize charmap code textcolor colorpicker contextmenu directionality emoticons fullscreen help hr image imagetools importcss insertdatetime legacyoutput link lists noneditable pagebreak paste preview print save searchreplace tabfocus table template textcolor textpattern toc visualblocks visualchars wordcount",
  menubar: "insert tools view format edit file table",
  toolbar: "media charmap code forecolor backcolor ltr rtl emoticons fullscreen help image insertdatetime link numlist bullist pagebreak paste preview print save searchreplace table template textcolor toc visualblocks visualchars"
  });
</script>
@endsection