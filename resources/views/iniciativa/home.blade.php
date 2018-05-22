<div class="card">
    <div class="card-header">
        <button class="btn btn-link"
                type="button"
                id="head_iniciativa{{ $proceso->id . "_" . $iniciativa->id }}"
                data-toggle="collapse"
                data-target="#collapse_iniciativa{{ $proceso->id . "_" . $iniciativa->id }}"
                aria-expanded="true"
                aria-controls="collapse_iniciativa{{ $proceso->id . "_" . $iniciativa->id }}">
            {{ $iniciativa->nombre }}
        </button>
    </div>
    <div id="collapse_iniciativa{{ $proceso->id . "_" . $iniciativa->id }}"
         class="collapse{{ $proceso->iniciativas()->first()->id == $iniciativa->id ? ' show' : '' }}"
         aria-labelledby="head_iniciativa{{ $proceso->id . "_" . $iniciativa->id }}"
         data-parent="#accordion_iniciativas{{ $proceso->id }}">
        <div class="card-body">
            <div class="row accordion"
                 id="accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
                <div class="col-md-3">
                    @include('iniciativa.layout.menu')
                </div>
                <div class="col-md-9">
                    @include('iniciativa.layout.info')
                    @include('iniciativa.layout.editar')
                    @include('iniciativa.layout.validacion_dic')
                    @include('iniciativa.layout.validacion_ei')
                    @include('iniciativa.layout.publicar')
                    @include('iniciativa.layout.eliminar')
                </div>
            </div>
        </div>
    </div>
</div>
