<?php


class TypeManager
{
    public static function getTypeById ($id) : Type
    {
        $type = new Type();
        $query = DB::getConn()->query("SELECT * FROM mkf_type WHERE id_type = $id");
        if($query){
            $item = $query->fetch();
            $type->setIdType($item['id_type'])->setTypeName($item['type_name']);
        }
        return $type;
    }
}