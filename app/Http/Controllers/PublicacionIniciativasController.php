<?php

namespace Workflow\Http\Controllers;

use Workflow\Http\Controllers\StateMachines\BaseStateMachine;

class PublicacionIniciativasController extends BaseStateMachine
{
    protected $state_table = [
        '_' => ['pattern_input' => '/^$/', 'pattern_output' => '/^$/', 'msg' => 'Iniciativa no presenta estados.', 's_msg' => 'Iniciativa creada con éxito.', 'f_msg' => 'No es posible crear la Iniciativa'],
        'a' => ['pattern_input' => '/^$|[ce]$/', 'pattern_output' => '/a$/', 'msg' => 'Iniciativa actualizada.', 's_msg' => 'Iniciativa actualizada con éxito.', 'f_msg' => 'La iniciativa no puede ser actualizada.'],
        'b' => ['pattern_input' => '/a$/', 'pattern_output' => '/b$/', 'msg' => 'Iniciativa aprobada (DIC).', 's_msg' => 'Iniciativa aprobada con éxito (DIC).', 'f_msg' => 'La iniciativa no puede ser aprobada (DIC).'],
        'c' => ['pattern_input' => '/a$/', 'pattern_output' => '/c$/', 'msg' => 'Iniciativa observada (DIC).', 's_msg' => 'Iniciativa observada con éxito (DIC).', 'f_msg' => 'La iniciativa no permite observaciones (DIC).'],
        'd' => ['pattern_input' => '/b$/', 'pattern_output' => '/d$/', 'msg' => 'Iniciativa aprobada (EI).', 's_msg' => 'Iniciativa aprobada con éxito (EI).', 'f_msg' => 'La iniciativa no puede ser aprobada (EI).'],
        'e' => ['pattern_input' => '/b$/', 'pattern_output' => '/e$/', 'msg' => 'Iniciativa observada(EI).', 's_msg' => 'Iniciativa observada con éxito (EI).', 'f_msg' => 'La iniciativa no permite observaciones (EI).'],
        'f' => ['pattern_input' => '/d$/', 'pattern_output' => '/f$/', 'msg' => 'Iniciativa  publicada.', 's_msg' => 'Iniciativa publicada con éxito.', 'f_msg' => 'La iniciativa no puede ser publicada.'],
        'g' => ['pattern_input' => '/^$|[ce]$/', 'pattern_output' => '/g$/', 'msg' => 'Iniciativa eliminada.', 's_msg' => 'Iniciativa eliminada con éxito.', 'f_msg' => 'No es posible eliminar la Iniciativa.'],
    ];

}
