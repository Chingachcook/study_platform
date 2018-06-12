@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <br>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Уроки</div>
                <div class="row d-flex align-items-stretch">
                    @foreach($lessons as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                        <div class="card" style="width: 20rem;">
                            <div class="card-body">
                                <h4 class="card-title">Урок {{ $item->id }}</h4>
                                <h5 class="card-subtitle mb-2 text-muted">{{ $item->title }}</h5>
                                <a class="btn btn-outline-info btn-block" href="{{ url('/admin/statistics_lesson_user/'.$item->id.'/'.$id_user) }}" role="button">Посмотреть</a>
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