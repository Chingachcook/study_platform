@extends('layouts.app')

@section('content')
    <br>
    <br>


    <section class="lesson">
        <div class="container">
            <h1>Урок {{$i++}}</h1>
            <br>
            <div class="row d-flex">
                <div class="col-lg-3 col-md-12 col-sm-12 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Модуль: {{$lesson->title}}</h5>
                            <p class="card-text">Урок: {{$lesson->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 d-flex justify-content-center">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <?php  ?>
                        <?php if (isset($lesson->id)) { ?>
                        <a href="{{ url('/document/' . $lesson->id) }}">
                            <button class="btn btn-danger btn-block btn-lesson">Документ</button>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="{{ url('/video/' . $lesson->id) }}">
                            <button class="btn btn-info btn-block btn-lesson">Видео</button>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="{{ url('/test/' . $lesson->id) }}">
                            <button class="btn btn-warning btn-block btn-lesson">Тест</button>
                        </a>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>
@endsection