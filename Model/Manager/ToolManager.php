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
        $query = DB::getConn()->query("SELECT * FROM mkf_tool WHERE id_tool IN 
            (SELECT tool_fk FROM mkf_use_tool WHERE art_fk = $id)");
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