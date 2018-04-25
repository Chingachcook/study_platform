@extends('layouts.app')

@section('content')
<br>
<br>

<section class="test">
    <div class="container">
        <div class="form-group">
            <div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" src="{{$video->video_path}} " frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
        <button type="submit" class="btn btn-warning"><a href="{{ url('/lesson/'.$video->lesson_id) }}">Назад</a></button>
    </div>
</section>
@endsection