@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Редактировать Урок</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/modules') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($lesson, [
                            'method' => 'PATCH',
                            'url' => ['/admin/lessons', $lesson->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                        @include ('admin.lessons.form', ['some_data' => $module_id],['submitButtonText' => 'Обновить'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
