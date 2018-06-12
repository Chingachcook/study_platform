@extends('layouts.app')

@section('content')
    <br>
    <br>

    <section class="module">
        <div class="container">
            <h1>Модули для обучения JS</h1>
            <br>
            <div class="row d-flex flex-row">
                <?php $i = 1; ?>
                @foreach($modules as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                        <div class="card" style="width: 20rem;">
                            <div class="card-header bg-dark text-white">
                                <h5 class="card-title p-2">{{ $item->title }}</h5>
                            </div>
                            <div class="card-body d-flex align-items-start flex-column">
                                <p class="card-text mb-auto p-2">{{ $item->description }}</p>
                                <a class="btn btn-success btn-block p-2"
                                   href="{{ url('/lessons_list/'.$item->id) }}" role="button">Уроки <?php echo $i; ?>
                                    модуля</a>
                                <a class="btn btn-info btn-block p-2"
                                   href="{{ url('/statistics_module/'.$item->id) }}"
                                   role="button">Статистика <?php echo $i; ?> модуля</a>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach
            </div>
            <br>
        </div>
    </section>
@endsection