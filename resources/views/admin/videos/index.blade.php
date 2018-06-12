@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Видео</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/lessons/'.$id) }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                        <a href="{{ url('/admin/videos/create/'.$id) }}" class="btn btn-success btn-sm" title="Добавить Видео">
                            <i class="fa fa-plus" aria-hidden="true"></i> Добавить Видео
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/videos', 'class' => 'form-inline my-2 my-lg-0 float-right', 'videos' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
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
                                @foreach($videos as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><a href="{{ url('/admin/videos', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->video_path }}</td>
                                        <td>
                                            <a href="{{ url('/admin/videos/' . $item->id . '/edit') }}" title="Редактировать Видео"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/videos', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Удалить Видео',
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
