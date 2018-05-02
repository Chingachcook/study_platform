@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Модули</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/modules/create') }}" class="btn btn-success btn-sm" title="Добавить Новый Модуль">
                            <i class="fa fa-plus" aria-hidden="true"></i> Добавить Модуль
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/modules', 'class' => 'form-inline my-2 my-lg-0 float-right', 'module' => 'search'])  !!}
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
                                        <th>ID</th><th>Наименование</th><th>Описание</th><th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($modules as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><a href="{{ url('/admin/modules', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ url('/admin/modules/' . $item->id) }}" title="Посмотреть Модуль"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/admin/modules/' . $item->id . '/edit') }}" title="Изменить Модуль"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/modules', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Удалить Модуль',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $modules->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
