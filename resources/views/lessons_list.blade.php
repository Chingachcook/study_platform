@extends('layouts.app')

@section('content')

    <br>
    <section class="module_list">
        <div class="container">
            <h1>Список уроков по модулю</h1>
            <br>
            <div class="row d-flex flex-row">
                @foreach($lessons as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Урок {{$i++}}</div>
                            <div class="card-body">
                                <p class="text-dark p-2">{{$item->title}}
                                <p class="text-dark mt-auto p-2">{{$item->description}}</p>
                                <a class="btn btn-info btn-block mt-auto p-2"
                                   href="{{ url('/document/'.$item->id) }}" role="button" style="margin-bottom: 7px;">Документ {{ $i-1 }}
                                    Урока</a>
                                <a class="btn btn-info btn-block mt-auto p-2"
                                   href="{{ url('/video/' . $item->id) }}" role="button" style="margin-bottom: 7px;">Видео {{ $i-1 }}
                                    Урока</a>
                                <a class="btn btn-info btn-block mt-auto p-2"
                                   href="{{ url('/test/' . $item->id) }}" role="button"
                                   style="margin-bottom: 7px;">Тест {{ $i-1 }} урока</a>
                                <a class="btn btn-danger btn-block mt-auto p-2"
                                   href="{{ url('/statistics_lesson/'.$item->id) }}" role="button">Статистика {{ $i-1 }}
                                    Урока</a>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection