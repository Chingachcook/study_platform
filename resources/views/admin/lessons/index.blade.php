@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Уроки</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/modules') }}" class="btn btn-warning btn-sm" title="Назад к Модулям">
                            <i class="fa fa-home" aria-hidden="true"></i> Назад
                        </a>
                        <a href="{{ url('/admin/lessons/create/'. $module ) }}" class="btn btn-success btn-sm" title="Добавить Новый Урок">
                            <i class="fa fa-plus" aria-hidden="true"></i> Добавить Урок
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/lessons', 'class' => 'form-inline my-2 my-lg-0 float-right', 'lessons' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Поиск...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Название</th><th>Описание</th><th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($lessons as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><a href="{{ url('/admin/lessons', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ url('/admin/lessons/' . $item->id) }}" title="Посмотреть Урок"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/admin/lessons/' . $item->id . '/edit') }}" title="Изменить Урок"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/lessons', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Удалить Урок',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
