<div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
    {!! Form::label('title', 'Название: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('document_path') ? ' has-error' : ''}}">
    {!! Form::label('title', 'Ссылка: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('document_path', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('document_path', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div style="display: none;" class="form-group{{ $errors->has('lesson_id') ? ' has-error' : ''}}">
    {!! Form::label('lesson_id', 'Урок: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('lesson_id', $id, ['class' => 'form-control']) !!}
        {!! $errors->first('lesson_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Создать', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
