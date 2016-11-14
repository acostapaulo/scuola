<?php
/**
 * Created by PhpStorm.
 * User: acost
 * Date: 08/11/2016
 * Time: 12:49 AM
 */
include('../class/include_dao.php');
if(isset($_POST['action'])){
    switch ($_POST['action']){
        case 'guardar':{
            $g=new Grado();
            $g->idgrado=$_POST['idgrado'];
            $g->grado=$_POST['grado'];
            $factory = new DAOFactory();
            $id = $factory->getGradoDAO()->insert($g);
            header("Location: grado_list.php");
            break;
        }
        case 'actualizar':{
            $g=new Grado();
            $g->idgrado=$_POST['idgrado'];
            $g->grado=$_POST['grado'];
            $factory = new DAOFactory();
            $id = $factory->getGradoDAO()->update($g);
            header("Location: grado_list.php");
            break;
        }
    }
}