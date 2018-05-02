@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Редактировать Документ</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/'.$id.'/documents') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                        <br/>
                        <br/>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($document, [
                            'method' => 'PATCH',
                            'url' => ['/admin/documents', $document->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                        @include ('admin.documents.form', ['id' => $id],['submitButtonText' => 'Обновить'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
