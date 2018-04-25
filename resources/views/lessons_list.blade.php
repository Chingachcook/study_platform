@extends('layouts.app')

@section('content')

    <br>
    <br>
    <section class="module_list">
        <div class="container">
            <h1>Список уроков по модулю</h1>
            <br>
            <div class="row align-items-stretch">
                <div class="col-lg-12 col-md-8 col-sm-12 d-flex justify-content-center">
                    <div class="list-group">
                        @foreach($lessons as $item)
                            <?php
                            if ($i==1) {
                                $active = "active";
                            } else {
                                $active = "";
                            }
                            ?>
                        <a href="{{ url('/lesson/'.$item->id) }}" class="list-group-item list-group-item-action flex-column align-items-start <?php $active; ?>">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Урок {{$i++}}  </h5>
                            </div>
                            <p class="mb-1">{{$item->title}}</p>
                            <small>{{$item->description}}</small>
                        </a>
                        <a class="btn btn-outline-info btn-block" href="{{ url('/statistics_lesson/'.$item->id) }}" role="button">Статистика</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection