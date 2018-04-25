@extends('layouts.app')

@section('content')
<br>
<br>

<section class="document">
    <div class="container">
        <iframe src="{{$document->document_path}}"
                width="100%" height="820" style="border: none;"></iframe>
        <button type="submit" class="btn btn-warning"><a href="{{ url('/lesson/'.$document->lesson_id)}}">Назад</a></button>
    </div>
</section>
@endsection
