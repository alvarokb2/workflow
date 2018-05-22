<div
    id="collapse_eliminar{{ $proceso->id . "_" . $iniciativa->id }}"
    class="collapse"
    aria-labelledby="collapse_eliminar{{ $proceso->id . "_" . $iniciativa->id }}"
    data-parent="#accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
    <div class="card">
        <div class="card-header">
            Eliminar
        </div>
        <div class="card-body">
            ¿ Esta seguro que desea eliminar la iniciativa ?<br><br>
            {!! Form::open(['route' => ['iniciativa.destroy', $iniciativa->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
