@extends('index')

@section('home_page')
    <div style="display: flex; justify-content: space-between; margin: 10px 10px">
        <div>

        </div>
        <div style="display: flex;">
            <form action="personal_page" method="post">
                <button type="submit" class="btn btn-success" style="margin-right: 20px">
                    Личный кабинет
                </button>
            </form>
            <form action="logout">
                <button type="submit" class="btn btn-primary">Выйти</button>
            </form>
        </div>
    </div>
    <br>
    <div style="display: flex; justify-content: space-between">
        <div style="width: 5%">

        </div>
        @if(isset($args['error']))
            <div class="alert alert-danger" role="alert" style="width: 40%">
                {{$args['error']}}
            </div>
        @endif
        @if(isset($args['success_alert']))
            <div class="alert alert-success" role="alert" style="width: 40%">
                {{$args['success_alert']}}
            </div>
        @endif
        <div style="width: 5%">

        </div>
    </div>
    <br>
    <div style="display: flex; justify-content: space-between">
        <div style="width: 5%">

        </div>
        <div style="width: 40%">
            <form action="add_post" method="post" enctype="multipart/form-data">
                <div class="mt-3">
                    <label for="basic-url" class="form-label">Введите пост</label>
                    <div class="input-group">
                        <textarea class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                                  name="text"></textarea>
                        <button class="btn btn-outline-secondary" type="submit">Поделиться</button>
                        <div class="input-group mt-3">
                            <input type="file" class="form-control" multiple name="images[]">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div style="width: 5%">

        </div>
    </div>
    <br>
    <div style="display: flex; justify-content: space-between">
        <div style="width: 5%">

        </div>
        <div style="width: 40%">
            @if(isset($posts))
                <div class="accordion accordion-flush" id="accordionExample">
                    @foreach($posts as $post)
                        <div style="display: flex">
                            <div class="accordion-item" style="width: 80%">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#{{$post['id']}}" aria-expanded="false"
                                            aria-controls="{{$post['id']}}">
                                        Пост от
                                        пользователя {{$post['user']['lastname']}} {{$post['user']['firstname']}}
                                    </button>
                                </h2>
                                <div style="float: right">
                                    {{date('Y-m-d H:i', strtotime($post['created_at']))}}
                                </div>
                                <div id="{{$post['id']}}" class="accordion-collapse collapse"
                                     data-bs-parent="#accordionExample"><br>
                                    <div class="accordion-body" style="white-space: pre-wrap; word-break: break-all">{{$post['text']}}</div><br>
                                    <div>
                                        @if(!empty($post['images']))
                                            Прикрепленные изображения<br>
                                            @foreach($post['images'] as $image)
                                                <a href="{{asset('storage/images/'.$image['filename'])}}"
                                                   target="_blank">
                                                    <img src="{{asset('storage/images/'.$image['filename'])}}"
                                                         width="200" height="200">
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <form action="delete_post" method="POST">
                                <input type="hidden" name="id" value="{{$post['id']}}">
                                <button type="submit" class="btn btn-danger"
                                        style="margin-left: 10px; width: 125px; height: 40px">Удалить пост
                                </button>
                            </form>
                        </div>
                        <br>
                    @endforeach
                </div>
            @endif
        </div>
        <div style="width: 5%">

        </div>
    </div>
@endsection
