<!-- Tindakan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tindakan_id', 'Tindakan Id:') !!}
    {!! Form::number('tindakan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Parameter Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_parameter_id', 'Jenis Parameter Id:') !!}
    {!! Form::number('jenis_parameter_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Limit Atas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('limit_atas', 'Limit Atas:') !!}
    {!! Form::number('limit_atas', null, ['class' => 'form-control']) !!}
</div>

<!-- Limit Bawah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('limit_bawah', 'Limit Bawah:') !!}
    {!! Form::number('limit_bawah', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tindakanikans.index') !!}" class="btn btn-default">Cancel</a>
</div>
