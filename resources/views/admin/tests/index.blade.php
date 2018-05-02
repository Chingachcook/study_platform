@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Тест</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/lessons/'.$id) }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                        <a href="{{ url('/admin/tests/create/'.$id) }}" class="btn btn-success btn-sm" title="Добавить Новый Вопрос">
                            <i class="fa fa-plus" aria-hidden="true"></i> Добавить Вопрос
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/tests', 'class' => 'form-inline my-2 my-lg-0 float-right', 'tests' => 'search'])  !!}
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
                                        <th>ID</th><th>Вопросы</th><th></th><th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($tests as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->title }}</td>

                                        <td></td>
                                        <td>
                                            <a href="{{ url('/admin/tests/' . $item->id . '/edit') }}" title="Изменить Тест"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/tests', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Удалить Тест',
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
