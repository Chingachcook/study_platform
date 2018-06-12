@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <br>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Модули</div>
                    <div class="row d-flex align-items-stretch">
                        @foreach($modules as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                                <div class="card" style="width: 20rem;">
                                    <div class="card-body">
                                        <h4 class="card-title">Модуль {{ $item->id }}</h4>
                                        <h5 class="card-subtitle mb-2 text-muted">{{ $item->title }}</h5>
                                        <p class="card-text">{{ $item->description }}</p>
                                        <a class="btn btn-outline-info btn-block" href="{{ url('/admin/lessons_list_admin_stat/'.$item->id) }}" role="button">Посмотреть</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection