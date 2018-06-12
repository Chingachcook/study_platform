@extends('layouts.app')

@section('content')
    <br>
    <br>

    <section class="document">
        <div class="container">
            <?php if (isset($video)) { ?>
            <iframe src="{{$video->video_path}}"
                    width="100%" height="820" style="border: none;"></iframe>
            <a href="{{ url('/lessons_list/'.$video->lesson_id)}}"><button type="submit" class="btn btn-warning">Назад</button></a>
            <?php } else { ?>
            <h1>Видео ещё не загружено. Пожалуйста обратитесь sap@medservice.kz</h1>
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
