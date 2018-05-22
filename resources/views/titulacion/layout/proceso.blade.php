<div class="card">
    <div class="card-header">
        <button class="btn btn-link"
                type="button"
                id="head_proceso{{ $proceso->id }}"
                data-toggle="collapse"
                data-target="#collapse_proceso{{ $proceso->id }}"
                aria-expanded="true"
                aria-controls="collapse_proceso{{ $proceso->id }}">
            {{ $proceso->nombre }}
        </button>
    </div>
    <div id="collapse_proceso{{ $proceso->id }}"
         class="collapse{{ $procesos->first()->id == $proceso->id ? ' show' : '' }}"
         aria-labelledby="head_proceso{{ $proceso->id }}"
         data-parent="#accordion_procesos">
        <div class="card-body">
            <div class="alert alert-info">Estado: {{ $proceso->estado }}</div>
            <hr>
            {{--Iniciativas--}}
            <div class="accordion" id="accordion_iniciativas{{ $proceso->id }}">
                @foreach($proceso->iniciativas()->get() as $iniciativa)
                    @include('iniciativa.home')
                @endforeach
            </div>
        </div>
    </div>
</div>
