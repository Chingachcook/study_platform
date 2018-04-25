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

<section class="test">
    <div class="container">
        <form class="form-test" method="post" name="form" action={{url('/result/'.$id)}}>
            {{ csrf_field() }}
            @foreach($tests as $item)
            <div class="form-group">
                <div class="question">
                    <p><strong>Вопрос {{' '.$j++.': '}}</strong>{{ $item->title }}</p>
                    @foreach($item->answer_child as $answer)
                    <label><input type="radio" name="{{$answer->question_id}}" id="{{$answer->id}}" value="{{ $answer->right }}" >{{ ' '. $answer->title }}</label>
                    @endforeach
                </div>
            </div>
            @endforeach
            <button type="submit" name="submit" value="push" class="btn btn-warning">Submit</button>
        </form>
        <img src="assets/img/right.png" alt="">
    </div>
</section>
@endsection