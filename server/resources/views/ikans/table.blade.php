<table class="table table-responsive" id="ikans-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Gambar</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ikans as $ikan)
        <tr>
            <td>{!! $ikan->nama !!}</td>
            <td>{!! $ikan->gambar !!}</td>
            <td>
                {!! Form::open(['route' => ['ikans.destroy', $ikan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ikans.show', [$ikan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ikans.edit', [$ikan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>