<style>
    .form-control{
        margin: 5px;
    }
</style>
<div class="form-outline form-white mb-4">
    {!! Form::label('name', '名稱') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-outline form-white mb-4">
    {!! Form::label('email', '電子郵件') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-outline form-white mb-4">
    {!! Form::label('password', '密碼') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>