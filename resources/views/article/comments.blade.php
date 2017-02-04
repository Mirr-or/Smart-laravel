<div class="form-group">
    {{ Form::label('comments', 'Коомментарий') }}
    {{ Form::textarea('comments', null, ['class' => 'form-control']) }}
</div>

{{ Form::submit($btnText, ['class' => 'btn btn-primary']) }}