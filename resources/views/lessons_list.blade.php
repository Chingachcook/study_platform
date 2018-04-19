@extends('layouts.app')

@section('content')

    <br>
    <br>
    <section class="module_list">
        <div class="container">
            <h1>Список уроков по модулю</h1>
            <br>
            <div class="row align-items-stretch">
                <div class="col-lg-3 col-md-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 d-flex justify-content-center">
                    <div class="list-group">
                        @foreach($lessons as $item)
                        <a href="{{ url('/lesson/'.$item->id) }}" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Урок {{$i++}}  </h5>
                            </div>
                            <p class="mb-1">{{$item->title}}</p>
                            <small>{{$item->description}}</small>
                        </a>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection