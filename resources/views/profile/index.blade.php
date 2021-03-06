@extends("layouts.layout")
@section("title")
    <title>LaravelBlog - 
    @if($profile == null)
        Profile 
    @else
        {{$profile->first_name. " " .$profile->last_name}}
    @endif
    </title>
@endsection
@section("content")

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<style>
    ul.nav li {
        padding: 10px;
    }
        ul.nav li a {
            z-index: 1000;
            display: block;
        }
</style>
<!-- Main Content -->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            @if($profile !== null)
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                        <img src="{{$profile->profile_img}}" alt="avatar" class="img-circle img-responsive"><br>
                        <h3>{{$profile->first_name. " " .$profile->last_name}}</h3>
                    
                    </div>
                    <div class=" col-md-9 col-lg-9">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#main-info">Осовна інформація</a></li>
                            <li><a data-toggle="tab" href="#posts">Пости</a></li>
                            <li><a data-toggle="tab" href="#comments">Коментарі</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="main-info">
                                <table class="table table-user-information">
                                    <tbody>
                                    @if(Auth::user()->id == $profile->user_id)
                                        <tr>
                                            <td></td>
                                            <td class="pull-right">
                                                <a class="" href="profile/edit/{{$profile->id}}"><i class="fa fa-edit"> Редагувати</i></a>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Ім'я:</td>
                                        <td><b>{{$profile->first_name}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Фамілія:</td>
                                        <td><b>{{$profile->last_name}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Електронна пошта:</td>
                                        <td><b><a href="mailto:@Model.UserData.Email">test@test.test</a></b></td>
                                    </tr>
                                    <tr>
                                        <td>Адреса:</td>
                                        <td><b>Address</b></td>
                                    </tr>
                                    <tr>
                                        <td>Номер телефону:</td>
                                        <td><b>{{$profile->phone_number}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Статус:</td>
                                        <td><b>active</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="bs-callout bs-callout-danger">
                                    <h4>Про мене:</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu,
                                        te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                                    </p>
                                    <p>
                                        Odio recteque expetenda eum ea, cu atqui maiestatis cum. Te eum nibh laoreet, case nostrud nusquam an vis.
                                        Clita debitis apeirian et sit, integre iudicabit elaboraret duo ex. Nihil causae adipisci id eos.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="posts">
                                <p><b>Статистика</b></p>
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Мої пости:</td>
                                            <td><b>@Model.Posts.Count</b></td>
                                        </tr>
                                        <tr>
                                            <td>Збережені пости:</td>
                                            <td><b>15</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#my">Мої пости</a></li>
                                    <li><a data-toggle="tab" href="#saved">Збережені пости</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="my">
                                        <p><b>Мої пости</b></p>
                                        <a href="@createPost">Написати пост</a>
                                        <table class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th style="width:35%"><b>Назва:</b></th>
                                                    <th style="width:10%"><b>Кількість переглядів:</b></th>
                                                    <th style="width:10%"><b>Кількість лайків:</b></th>
                                                    <th style="width:10%"><b>Кількість дизлайків:</b></th>
                                                    <th style="width:15%"><b>Дата створення:</b></th>
                                                    <th style="width:20%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        	    @foreach($posts as $post)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ url('/posts/'.$post->id) }}">{{$post->title}}</a>
                                                        </td>
                                                        <td>{{$post->seen}}</td>
                                                        <td>@{{$post.->likes}}</td>
                                                        <td>{{$post->dislikes}}</td>
                                                        <td>
	                                                        @php
											                {{
											                  $date = date_create($post->created_at);
											                  $date = date_format($date, 'd.m.Y');
											                }}
											                @endphp
											                {{$date}}
											            </td>
                                                        @if(uth::user()->id == $profile->user_id)
       	                                              	    <td class="actions" data-th="">
                                                                <a class="btn btn-primary" href="{{ url('/posts/edit/'.$post->id) }}"><i class="fa fa-edit"></i></a>
                                                                <button type="button"
                                                                        class="btn btn-sm text-white btn-danger"
                                                                        id="@(post.Id)"
                                                                        onclick="setDeletePostValues(this.id)"
                                                                        data-toggle="modal"
                                                                        data-target="#delete-post">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="saved">
                                        Збережені пости
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="avatar" class="img-circle img-responsive"><br>
                        <h3>Ім`я Фамілія(не вказано)</h3>
                    
                    </div>
                    <div class=" col-md-9 col-lg-9">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#main-info">Осовна інформація</a></li>
                            <li><a data-toggle="tab" href="#posts">Пости</a></li>
                            <li><a data-toggle="tab" href="#comments">Коментарі</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="main-info">
                                <table class="table table-user-information">
                                    <tbody>
                                    @if(Auth::user()->id != null)
                                        <tr>
                                            <td></td>
                                            <td class="pull-right">
                                                <a class="" href="profile/create/{{Auth::user()->id}}"><i class="fa fa-edit"> Додати інформацію про себе</i></a>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Ім'я:</td>
                                        <td><b>(не вказано)</b></td>
                                    </tr>
                                    <tr>
                                        <td>Фамілія:</td>
                                        <td><b>(не вказано)</b></td>
                                    </tr>
                                    <tr>
                                        <td>Електронна пошта:</td>
                                        <td><b><a href="mailto:@Model.UserData.Email">test@test.test</a></b></td>
                                    </tr>
                                    <tr>
                                        <td>Адреса:</td>
                                        <td><b>Address</b></td>
                                    </tr>
                                    <tr>
                                        <td>Номер телефону:</td>
                                        <td><b>(не вказано)</b></td>
                                    </tr>
                                    <tr>
                                        <td>Статус:</td>
                                        <td><b>active</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="bs-callout bs-callout-danger">
                                    <h4>Про мене:</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu,
                                        te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                                    </p>
                                    <p>
                                        Odio recteque expetenda eum ea, cu atqui maiestatis cum. Te eum nibh laoreet, case nostrud nusquam an vis.
                                        Clita debitis apeirian et sit, integre iudicabit elaboraret duo ex. Nihil causae adipisci id eos.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="posts">
                                <p><b>Статистика</b></p>
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Мої пости:</td>
                                            <td><b>@Model.Posts.Count</b></td>
                                        </tr>
                                        <tr>
                                            <td>Збережені пости:</td>
                                            <td><b>15</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#my">Мої пости</a></li>
                                    <li><a data-toggle="tab" href="#saved">Збережені пости</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="my">
                                        <p><b>Мої пости</b></p>
                                        <a href="@createPost">Написати пост</a>
                                        <table class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th style="width:35%"><b>Назва:</b></th>
                                                    <th style="width:10%"><b>Кількість переглядів:</b></th>
                                                    <th style="width:10%"><b>Кількість лайків:</b></th>
                                                    <th style="width:10%"><b>Кількість дизлайків:</b></th>
                                                    <th style="width:15%"><b>Дата створення:</b></th>
                                                    <th style="width:20%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        	    @foreach($posts as $post)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ url('/posts/'.$post->id) }}">{{$post->title}}</a>
                                                        </td>
                                                        <td>{{$post->seen}}</td>
                                                        <td>@{{$post.->likes}}</td>
                                                        <td>{{$post->dislikes}}</td>
                                                        <td>
	                                                        @php
											                {{
											                  $date = date_create($post->created_at);
											                  $date = date_format($date, 'd.m.Y');
											                }}
											                @endphp
											                {{$date}}
											            </td>
                                                        @if(Auth::user()->id != null)
       	                                              	    <td class="actions" data-th="">
                                                                <a class="btn btn-primary" href="{{ url('/posts/edit/'.$post->id) }}"><i class="fa fa-edit"></i></a>
                                                                <button type="button"
                                                                        class="btn btn-sm text-white btn-danger"
                                                                        id="@(post.Id)"
                                                                        onclick="setDeletePostValues(this.id)"
                                                                        data-toggle="modal"
                                                                        data-target="#delete-post">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="saved">
                                        Збережені пости
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="panel-footer">
            <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
            <span class="pull-right">
                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            </span>
        </div>
    </div>
</div>

<div id="delete-post" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Видалити цей пост?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <input type='hidden' id="delete-id" />
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger" type="button" id="confirm" onclick="deletePost('/Posts/Delete/')">
                    <i class="fa fa-trash"></i>
                    Видалити
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Скасувати</button>
            </div>
        </div>

    </div>
</div>
<script>
    function setDeletePostValues(id) {
        $("#delete-id").val(id);
    }
    function deletePost(url) {
        var id = $("#delete-id").val();
        ajaxQuery(id, url);
    }
    function ajaxQuery(id, url) {
        $.post(
            url + id,
            onAjaxSuccess
        );
    }
    function onAjaxSuccess(data) {
        location.reload();
    }
</script>
@endsection