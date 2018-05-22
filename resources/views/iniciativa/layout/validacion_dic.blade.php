<div
    id="collapse_val_dic{{ $proceso->id . "_" . $iniciativa->id }}"
    class="collapse"
    aria-labelledby="collapse_val_dic{{ $proceso->id . "_" . $iniciativa->id }}"
    data-parent="#accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
    <div class="card">
        <div class="card-header">
            Validación DIC
        </div>
        <div class="card-body">
            ¿ Esta seguro que desea validar
            la iniciativa ?
            <br><br>
            <a href="{{ route('iniciativa.validar_dic', ['id' => $iniciativa->id, 'value' => true]) }}"
               class="btn btn-primary">Aceptar</a>
            <a href="{{ route('iniciativa.validar_dic', ['id' => $iniciativa->id, 'value' => false]) }}"
               class="btn btn-primary">Rechazar</a>
        </div>
    </div>
</div>