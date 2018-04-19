@extends('layouts.app')

@section('content')
<br>
<br>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Library</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>
</div>
<br>

<section class="lesson">
    <div class="container">
        <h1>Урок {{$i++}}</h1>
        <br>
        <div class="row d-flex">
            <div class="col-lg-3 col-md-12 col-sm-12 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="..." alt="..." class="img-thumbnail">
                    <div class="card-body">
                        <h5 class="card-title">{{$lesson->title}}</h5>
                        <p class="card-text">{{$lesson->description}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 d-flex justify-content-center">
                <a class="btn btn-danger btn-block align-self-center btn-lesson" href="{{ url('/document/' . $lesson->id) }}">Document</a>
                <span>&nbsp;&nbsp;&nbsp;</span>
                <a class="btn btn-info btn-block align-self-center btn-lesson" href="{{ url('/video/' . $lesson->id) }}">Video</a>
                <span>&nbsp;&nbsp;&nbsp;</span>
                <a class="btn btn-warning btn-block align-self-center btn-lesson" href="{{ url('/test/' . $lesson->id) }}">Test</a>
            </div>
        </div>
        <br>
    </div>
</section>
@endsection