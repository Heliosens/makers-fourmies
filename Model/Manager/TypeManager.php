<?php


class TypeManager
{
    /**
     * @param $id
     * @return Type
     */
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

    /**
     * @return array
     */
    public static function allType () : array
    {
        $type = [];
        $query = DB::getConn()->query("SELECT * FROM mkf_type");
        if($query){
            foreach ($query->fetchAll() as $item){
                $type[] = [
                    $item['id_type'] => $item['type_name']
                ];
            }
        }
        return $type;
    }

}