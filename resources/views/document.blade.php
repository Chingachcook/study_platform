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

<section class="document">
    <div class="container">
        <iframe src="{{$document->document_path}}"
                width="700" height="820" style="border: none;"></iframe>
        <button type="submit" class="btn btn-warning"><a href="{{ url('/lesson/'.$document->lesson_id)}}">Назад</a></button>
    </div>
</section>
@endsection
