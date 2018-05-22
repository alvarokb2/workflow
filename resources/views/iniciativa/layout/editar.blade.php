<div id="collapse_editar{{ $proceso->id . "_" . $iniciativa->id }}"
     class="collapse"
     aria-labelledby="collapse_editar{{ $proceso->id . "_" . $iniciativa->id }}"
     data-parent="#accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
    <div class="card">
        <div class="card-header">
            Editar
        </div>
        <div class="card-body">
            {!! Form::open(['route' => ['iniciativa.update', $iniciativa->id], 'method' => 'PUT']) !!}
            {!! Form::hidden('id', $iniciativa->id) !!}
            <div class="form-group">
                {!! Form::text('nombre', $iniciativa->nombre, ['class'=>'form-control', 'placeholder' => 'nombre']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('descripcion', $iniciativa->descripcion, ['class'=>'form-control', 'placeholder' => 'descripcion']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('producto_esperado', $iniciativa->producto_esperado, ['class'=>'form-control', 'placeholder' => 'producto esperado']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
