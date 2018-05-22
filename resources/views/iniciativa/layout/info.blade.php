<div
    id="collapse_info{{ $proceso->id . "_" . $iniciativa->id }}"
    class="collapse show"
    aria-labelledby="collapse_info{{ $proceso->id . "_" . $iniciativa->id }}"
    data-parent="#accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
    <div class="card">
        <div class="card-header">
            Informacion de la Iniciativa
        </div>
        <div class="card-body">
            <b>Nombre:</b> {{ $iniciativa->nombre }}<br>
            <b>Descripción:</b> {{ $iniciativa->descripcion }}<br>
            <b>Producto esperado:</b> {{ $iniciativa->producto_esperado }}
            <hr>
            <b>Estado:</b> {{ $iniciativa->estado }}<br>
            <b>Mensaje:</b> {{ $iniciativa->get_estado() }}
        </div>
    </div>
</div>
