@extends('layouts.app')

@section('content')
<br>
<br>

<section class="test">
    <div class="container">
        <h6 class="display-4">Тест {{ $id }}</h6>
        <form class="form-test" method="post" name="form" style="padding: 20px" action={{url('/result/'.$id)}}>
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
            <button type="submit" name="submit" value="push" class="btn btn-warning">Принять</button>
        </form>
    </div>
</section>
@endsection