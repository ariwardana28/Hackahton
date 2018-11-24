<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Katalog Ikan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('katalog_ikan_id', 'Katalog Ikan Id:') !!}
    {!! Form::number('katalog_ikan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('units.index') !!}" class="btn btn-default">Cancel</a>
</div>
