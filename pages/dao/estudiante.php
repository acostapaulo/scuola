<?php
/**
 * Created by PhpStorm.
 * User: acost
 * Date: 03/11/2016
 * Time: 11:13 PM
 */
class Estudiante{
    private $idestudiante;


    /**
     * @return mixed
     */
    public function getIdestudiante()
    {
        return $this->idestudiante;
    }

    /**
     * @param mixed $idestudiante
     */
    public function setIdestudiante($idestudiante)
    {
        $this->idestudiante = $idestudiante;
    }

}