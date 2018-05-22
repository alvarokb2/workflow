<div class="btn-group-vertical" style="width: 100%;">
    @include('iniciativa.layout.menu_button', ['nombre_menu' => 'Información', 'data_target' => 'collapse_info' . $proceso->id . "_" . $iniciativa->id])
    @include('iniciativa.layout.menu_button', ['nombre_menu' => 'Editar', 'data_target' => 'collapse_editar' . $proceso->id . "_" . $iniciativa->id])
    @include('iniciativa.layout.menu_button', ['nombre_menu' => 'Validación DIC', 'data_target' => 'collapse_val_dic' . $proceso->id . "_" . $iniciativa->id])
    @include('iniciativa.layout.menu_button', ['nombre_menu' => 'Validación EI', 'data_target' => 'collapse_val_ei' . $proceso->id . "_" . $iniciativa->id])
    @include('iniciativa.layout.menu_button', ['nombre_menu' => 'Publicar', 'data_target' => 'collapse_publicar' . $proceso->id . "_" . $iniciativa->id])
    @include('iniciativa.layout.menu_button', ['nombre_menu' => 'Eliminar', 'data_target' => 'collapse_eliminar' . $proceso->id . "_" . $iniciativa->id])
</div>
