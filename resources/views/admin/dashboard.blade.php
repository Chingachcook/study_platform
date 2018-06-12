@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Админская Панель</div>

                    <div class="card-body">
                        Добро пожаловать на админскую панель сайта.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
