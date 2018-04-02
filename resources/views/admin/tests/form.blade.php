<div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
    {!! Form::label('title', 'Вопрос: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
        {!! Form::label('title', 'Ответ 1: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ Form::radio('answer', 'answer_1') }}
                    </div>
                </div>
                {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
        {!! Form::label('title', 'Ответ 2: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ Form::radio('answer', 'answer_1') }}
                    </div>
                </div>
                {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
        {!! Form::label('title', 'Ответ 3: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ Form::radio('answer', 'answer_1') }}
                    </div>
                </div>
                {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
        {!! Form::label('title', 'Ответ 4: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ Form::radio('answer', 'answer_1') }}
                    </div>
                </div>
                {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('lesson_id') ? ' has-error' : ''}}">
    {!! Form::label('lesson_id', 'Урок: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('lesson_id', $module_id, ['class' => 'form-control']) !!}
        {!! $errors->first('lesson_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Создать', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
