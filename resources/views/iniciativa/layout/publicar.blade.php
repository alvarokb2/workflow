<div id="collapse_publicar{{ $proceso->id . "_" . $iniciativa->id }}"
     class="collapse"
     aria-labelledby="collapse_publicar{{ $proceso->id . "_" . $iniciativa->id }}"
     data-parent="#accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
    <div class="card">
        <div class="card-header">
            Publicar
        </div>
        <div class="card-body">
            ¿ Esta seguro que desea publicar la iniciativa ?<br><br>
            <a href="{{ route('iniciativa.publicar', ['id' => $iniciativa->id]) }}"
               class="btn btn-primary">Aceptar</a>
        </div>
    </div>
</div>
