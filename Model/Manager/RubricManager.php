<?php


class RubricManager
{
    public const RUBRICS = [
        'Type',
        'Categorie',
        'Technique',
        'Outil',
        'Matière'
    ];

    /**
     * return all rubric names
     */
    public static function allRubrics(){
        $rubrics = [];
        foreach (self::RUBRICS as $key => $item){
            $rubrics[$key] = ['rubric' => $item];
        }
        return $rubrics;
    }
}