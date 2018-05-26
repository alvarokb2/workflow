<?php
/**
 * Created by: Felipe Cabedo V.
 * Date: 24/05/2018
 * Time: 22:01
 * version: 0.000.001
 */

namespace Workflow\Http\Controllers\StateMachines;

/**
 * Class BaseStateMachine
 * @package Workflow\Http\Controllers
 */
class BaseStateMachine
{
    /**
     * @var array
     */
    protected $state_table = [];

    /**
     * @param $state
     * @return mixed|null
     */
    public function get_status($state)
    {
        if (array_key_exists($state, $this->state_table)) {
            return $this->state_table[$state];
        }
        return null;
    }

    /**
     * @param $state
     * @return mixed|null
     */
    public function find_status($state)
    {
        foreach ($this->state_table as $e) {
            if (preg_match($e['pattern_output'], $state)) {
                return $e;
            }
        }
        return null;
    }

    /**
     * @param $initial_state
     * @param $final_state
     * @param mixed $state = null
     * @return bool
     */
    public function check_final_status($initial_state, $final_state, &$state = null)
    {
        foreach ($this->state_table as $e) {
            if (preg_match($e['pattern_output'], $final_state)) {
                if (preg_match($e['pattern_input'], $initial_state)) {
                    $state = $e;
                    return true;
                }
            }
        }
        return false;
    }
}
