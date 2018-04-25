@extends('layouts.app')

@section('content')
    <br>
    <br>

    <section class="module">
        <div class="container">
            <h1>Поиск по ошибкам систем</h1>
            <br>
            <div class="card" style="width: auto;">
                <div class="card-header">Ошибки</div>
                <div class="card-body">
                    {!! Form::open(['method' => 'GET', 'url' => '/problems', 'class' => 'form-inline my-2 my-lg-0 float-right', 'problem' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Поиск...">
                        <span class="input-group-append">
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
                                <th>Наименование</th>
                                <th>Код</th>
                                <th>Описание</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($problems as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'url' => ['/problems', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination"> {!! $problems->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        </div>
    </section>
@endsection