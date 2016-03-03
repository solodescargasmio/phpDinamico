<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('./clases/atributo.php');
require_once ('./clases/formulario.php');
require_once ('./clases/form_attr.php');
require_once ('./clases/template.php');
require_once ('./clases/session.php');
require_once ('./clases/admin.php');
require_once ('./clases/estudio_medico.php');
require_once ('./clases/dependencia.php');
require_once ('./clases/datosPrecargados.php');
require_once ('ctrl_dinamico.php');
function ingresar(){
  error_reporting(0);
  $mensage="";
  $admin=new admin();
  $admin=$admin->traerAdmin();
   Session::init();
    $tpl=new Template();
    $titulo="Estudios Médicos";
    if($_POST){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        if(strcmp($user,$admin->getUser())==0){
         if(strcmp($user,$admin->getUser())==0){
             Session::set("usuario", "admin");
             header("Location: ingresar.php");
         }else{$mensage="Error en password. Verifíque";}   
        }  else {
        $mensage="Error en Usuario. Verifíque";    
        }
    }else{
        if($_GET){
            $user=$_GET['user'];
            Session::set("usuario", "comun");
             header("Location: ingresar.php");
        }
    }
      $datos=array(
           "mensage" => $mensage,
       );   
    $tpl->asignar("titulo", $titulo);
    $tpl->mostrar("ingreso", $datos);
}

