@extends('layouts.app')

@section('content')
    <br>
    <br>

    <section class="document">
        <div class="container">
            <?php if (isset($document)) { ?>
            <iframe src="{{$document->document_path}}"
                    width="100%" height="820" style="border: none;"></iframe>
                <a href="{{ url('/lessons_list/'.$document->lesson_id)}}"><button type="submit" class="btn btn-warning">Назад</button></a>
            <?php } else { ?>
                <h1>Документ ещё не загружен. Пожалуйста обратитесь sap@medservice.kz</h1>
                <br>
                <br>
				<br>
                <br>
				<br>
                <br>
				<br>
                <br>
                <a href="{{ url('/lessons_list/'.$lesson_path)}}"><button type="submit" class="btn btn-warning">Назад</button></a>
            <?php } ?>
        </div>
    </section>
@endsection
