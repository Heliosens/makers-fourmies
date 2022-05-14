<?php


class StateManager
{
    /**
     * @param $option
     * @return State
     */
    public static function stateByName($option) : State
    {
        $state = new State();
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "state WHERE state = '$option'");
        if($query){
            $result = $query->fetch();
            $state->setId($result['id_state'])->setState($result['state']);
        }
        return $state;
    }
}