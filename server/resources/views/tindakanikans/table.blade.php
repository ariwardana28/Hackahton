<table class="table table-responsive" id="tindakanikans-table">
    <thead>
        <tr>
            <th>Tindakan Id</th>
        <th>Jenis Parameter Id</th>
        <th>Limit Atas</th>
        <th>Limit Bawah</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tindakanikans as $tindakanikan)
        <tr>
            <td>{!! $tindakanikan->tindakan_id !!}</td>
            <td>{!! $tindakanikan->jenis_parameter_id !!}</td>
            <td>{!! $tindakanikan->limit_atas !!}</td>
            <td>{!! $tindakanikan->limit_bawah !!}</td>
            <td>
                {!! Form::open(['route' => ['tindakanikans.destroy', $tindakanikan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tindakanikans.show', [$tindakanikan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tindakanikans.edit', [$tindakanikan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>