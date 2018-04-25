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
                <a class="btn btn-danger btn-block align-self-center btn-lesson" href="{{ url('/document/' . $lesson->id) }}">Document</a>
                <span>&nbsp;&nbsp;&nbsp;</span>
                <a class="btn btn-info btn-block align-self-center btn-lesson" href="{{ url('/video/' . $lesson->id) }}">Видео</a>
                <span>&nbsp;&nbsp;&nbsp;</span>
                <a class="btn btn-warning btn-block align-self-center btn-lesson" href="{{ url('/test/' . $lesson->id) }}">Test</a>
            </div>
        </div>
        <br>
    </div>
</section>
@endsection