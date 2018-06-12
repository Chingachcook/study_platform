@extends('layouts.app')

@section('content')
    <br>
    <br>

    <?php if (isset($tests[0]->answer_child)) {
        $bg_color = "#f5f8fa";
    } else {
        $bg_color = "#e9ecef";
    }
    ?>

    <section class="test">
        <div class="container">
            <form class="form-test" method="post" name="form" style="padding: 20px; background-color: <?php echo $bg_color; ?>;" action={{url('/result/'.$id)}}>
                {{ csrf_field() }}
            <?php if (isset($tests[0]->answer_child)) { ?>
                <h6 class="display-4">Тест</h6>
                    @foreach($tests as $item)
                        <div class="form-group">
                            <div class="question">
                                <p><strong>Вопрос {{' '.$j++.': '}}</strong>{{ $item->title }}</p>
                                @foreach($item->answer_child as $answer)
                                    <label><input type="radio" name="{{$answer->question_id}}" id="{{$answer->id}}"
                                                  value="{{ $answer->right }}" required>{{ ' '. $answer->title }}</label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                <button type="submit" name="submit" value="push" class="btn btn-warning">Принять</button>
            </form>
            <?php } else { ?>
            <h1>Тест ещё не загружен. Пожалуйста обратитесь sap@medservice.kz</h1>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="{{ url('/lessons_list/'.$id)}}"><button type="button" class="btn btn-warning">Назад</button></a>
            <?php } ?>
        </div>
    </section>
@endsection