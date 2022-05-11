<?php


class ToolManager
{
    /**
     * @param int $id
     * @return array
     */
    public static function toolByArt (int $id) : array
    {
        $tools = [];
        $query = DB::getConn()->query("SELECT * FROM " . Config::PRE . "tool WHERE id IN 
            (SELECT tool_fk FROM " . Config::PRE . "art_tool WHERE art_fk = $id)");
        if($query){
            foreach ($query->fetchAll() as $item){
                $tools[] = (new Tool())
                    ->setIdTool($item['id_tool'])
                    ->setToolName($item['tool'])
                ;
            }
        }
        return $tools;
    }
}