<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('./clases/session.php');
   Session::init();
    $id_user=Session::get('cedula');
    $archivo=$_GET['archivo'];
    $extencion=$_GET['extension'];
    $ruta = './multimedia/'.$id_user.'/'.$archivo.'.'.$extencion;
if (is_file($ruta))
{
   header('Content-Type: application/force-download');
   header('Content-Disposition: attachment; filename='.$archivo.'.'.$extencion);
   header('Content-Transfer-Encoding: binary');
   header('Content-Length: '.filesize($ruta));

   readfile($ruta);

    
    
    
    
    
    
//header("Content-disposition: attachment; filename=".$archivo.".".$extencion);
//header("Content-type: application/pdf");
//readfile("Hipercubo.pdf");
}

if($_GET['pdf']){
    $pdf=$_GET['pdf'];
  $ruta ='./imagenes/'.$pdf; 
   header('Content-Type: application/force-download');
   header('Content-Disposition: attachment; filename='.$pdf);
   header('Content-Transfer-Encoding: binary');
   header('Content-Length: '.filesize($ruta));

   readfile($ruta);
}
