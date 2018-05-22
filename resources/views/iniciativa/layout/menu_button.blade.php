<button type="button" class="btn"
        id="head{{ $proceso->id . "_" . $iniciativa->id  }}"
        data-toggle="collapse"
        data-target="#{{ $data_target }}"
        aria-expanded="true"
        aria-controls="{{ $data_target }}">
    {{ $nombre_menu }}
</button>
