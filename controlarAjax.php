<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('./clases/formulario.php');
error_reporting(0);
if($_POST['nom_formulario']){
$nomb=$_POST['nom_formulario'];
$formula=new formulario();
$formula->setNombre($nomb);
$form=$formula->traerFormularioId();
        if(isset($form)){
 echo '<h4><font style="color:red;">Ya existe la ficha en base de datos<br> Puede ingresar una nueva version de la misma presionando Nueva Version </font></h4>';     
        }
}