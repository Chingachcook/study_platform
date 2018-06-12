<div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
    {!! Form::label('title', 'Вопрос: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group{{ $errors->has('answer1') ? ' has-error' : ''}}">
        {!! Form::label('answer1', 'Ответ 1: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ Form::radio('right', '1') }}
                    </div>
                </div>
                {!! Form::text('answer1', $p[0]->title, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('answer1', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
        {!! Form::label('answer2', 'Ответ 2: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ Form::radio('right', '2') }}
                    </div>
                </div>
                {!! Form::text('answer2', $p[1]->title, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('answer2', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
        {!! Form::label('answer3', 'Ответ 3: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ Form::radio('right', '3') }}
                    </div>
                </div>
                {!! Form::text('answer3', $p[2]->title, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('answer3', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
        {!! Form::label('answer4', 'Ответ 4: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ Form::radio('right', '4') }}
                    </div>
                </div>
                {!! Form::text('answer4', $p[3]->title, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('answer4', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('lesson_id') ? ' has-error' : ''}}">
    <div class="col-md-6" style="display: none;">
        {!! Form::label('lesson_id', 'Урок: ', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('lesson_id', $id, ['class' => 'form-control']) !!}
        {!! $errors->first('lesson_id', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group">
        <div class="col-md-offset-4 col-md-4">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Создать', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>