<a href="{{ route('user.edit', $id) }}" class='btn btn-info btn-xs'>
    <i class="glyphicon glyphicon-edit"></i>
</a>

<a href="{{ route('user.menu',$user->id) }}" class="btn btn-xs btn-default">
    <span class="glyphicon glyphicon-list-alt" data-toggle="tooltip" title="Menu"></span>
</a>

<a href="#modal-delete-{{$id}}" data-toggle="modal" class='btn btn-danger btn-xs'>
    <i class="glyphicon glyphicon-remove"></i>
</a>

<div class="modal fade" id="modal-delete-{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => ['user.destroy', $id], 'method' => 'delete']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Eliminar</h4>
            </div>
            <div class="modal-body">
                Seguro que desea eliminar al usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">SI</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
