@extends('layouts.app')

@section('content')
<br>
<br>

<section class="module">
    <div class="container">
        <h1>Модули для обучения</h1>
        <br>
        <div class="row d-flex align-items-stretch">
            @foreach($modules as $item)
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title">Модуль {{ $i++ }}</h4>
                        <h5 class="card-subtitle mb-2 text-muted">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <a class="btn btn-outline-info btn-block" href="{{ url('/lessons_list/'.$item->id) }}" role="button">Посмотреть</a>
                        <a class="btn btn-outline-info btn-block" href="{{ url('/statistics_module/'.$item->id) }}" role="button">Статистика</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </div>
</section>
@endsection