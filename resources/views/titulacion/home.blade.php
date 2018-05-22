<div class="card">
    <div class="card-header">Procesos de Titulación</div>
    <div class="card-body">
        <div class="container-fluid">
            @isset($procesos)
                <div class="accordion" id="accordion_procesos">
                    @foreach($procesos as $proceso)
                        @include('titulacion.layout.proceso')
                    @endforeach
                </div>
            @else
                <div class="alert alert-danger">No existen procesos de titulación.</div>
            @endisset
        </div>
    </div>
</div>
