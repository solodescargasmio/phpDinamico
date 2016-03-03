<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('./clases/formulario.php');
require_once ('./clases/atributo.php');
require_once ('./clases/admin.php');
require_once ('./clases/estudio_medico.php');
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
        else
            if($_POST['formulario']){ 
                $attr=new atributo();
        $nomb=$_POST['formulario'];
        $formula=new formulario();
        $formula->setNombre($nomb);
        $form=$formula->traerFormularioId();
        //var_dump($form);exit();
        $resultado=$attr->traerAtributosForm($form->getId_form());
        foreach ($resultado as $value) { 
      echo '<div class="form-group" id="'.$value->getNombre().'">';
       echo '<label  class="col-sm-8 control-label">'.strtoupper($value->getNombre()).' v('.$form->getVersion().')</label>';
       echo '<div class="col-lg-10">';
       echo '<input type="text" id="'.$value->getNombre().'" name="'.$value->getNombre().'" value="'.$value->getTipo().'" readonly=>';
        echo'<input type="button" id="'.$value->getNombre().'" value="-" style="color: red;" name="eliminar" ident="'.$value->getNombre().'" onclick="eliminarElementoDom()"></div></div>';
     
        }
        }else
            if($_POST['user']){
                $id_usuario=$_POST['user'];
                $estudio=new estudio_medico();
                $estudio=$estudio->traerEstudioId($id_usuario);
            if(isset($estudio)){
 echo '<h4><font style="color:red;">Ya existe el paciente en base de datos<br> Verifique la cedula </font></h4>';     
        }     
            }
            else
            if($_POST['idtraer']){
                $id_usuario=$_POST['idtraer'];
                 $attr=new atributo();
                 $formula=new formulario();
                 $resul=$formula->traerFormularios();
                 $estudio=new estudio_medico();
                $estudios=$estudio->traerFormEchos($id_usuario);
                $tam=count($resul);
          echo '<table class="table table-condensed" border="1"><tr class="success">';
          foreach ($resul as $key => $value) {
         echo '<td>'.strtoupper($value->getNombre()).'</td>';     
         }        
  echo '</tr>';
                echo '<tr>';
       if($estudios!=null){
          foreach ($resul as $key => $value){
             if($estudio->ok($id_usuario, $value->getId_form())){
             echo '<td><img src="./imagenes/si.png"/></td>';
             }else{  
                   echo '<td><img src="./imagenes/no.png" /></td>';
       }
         }        
     }
     echo '<tr>';
   
         echo '</tr>'; 
         echo '</table>';
         echo '<input type="submit" value="<<Trabajar con este paciente>>" class="form-control btn btn-primary" onClick=window.location="ingresar.php?idpaciente='.$id_usuario.'">';   
       }else
            if($_POST['admin']){
                $id_usuario=$_POST['admin'];
                $admin=new admin();
                $admin=$admin->traerAdmin();
            if(strcmp($id_usuario,$admin->getUser())!=0){
 echo '<img src="./imagenes/no.png"/><font style="color:red;"> Error en usuario</font>';     
        }else{ echo '<img src="./imagenes/si.png"/>';}     
            }
 