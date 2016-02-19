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
function principal(){
     error_reporting(0);
    $mensage="";
    $tpl=new Template();
    $titulo="Estudios Médicos";
          $form=new formulario();
          $resultado=$form->traerFormularios();
          if($resultado!=null){
          foreach ($resultado as $key => $value) {
         $formularios[]=$value;
              }
              
                  
          }else{$mensage="No existen formularios ingresados.<br> Ingrese un formulario.";}
       $datos=array(
           "mensage" => $mensage,
         "formularios" => $formularios 
       );   

       $tpl->asignar("titulo", $titulo);
       $tpl->mostrar("index", $datos);
}

function formularios(){
     error_reporting(0);
       $mensage="";
    $tpl=new Template();
    $titulo="Estudios Médicos";
        $dato=$_GET['id'];  
        $nombre=$_GET['nombre'];
        $atr=new atributo();
        $fr_atr=new form_attr();
        $fr_atr->setId_form($dato);
        $dat=$fr_atr->existenAtributos();
        if($dat>0){
        $resultado=$atr->traerAtributosForm($dato);
        if($resultado==null){
          $mensage="No existen para este formulario.<br> Ingrese una nueva version del formulario.";  
        }
        $form=new formulario();
          $resultados=$form->traerFormularios();
          if($resultados!=null){
          foreach ($resultados as $key => $value) {
         $formularios[]=$value;
          }}
        $datos=array(
            "nombreform" => $nombre,
            "atributos" => $resultado,
            "mensage" => $mensage
        );
   $tpl->asignar( "formularios", $formularios);
        $tpl->asignar("titulo", $titulo);
        $tpl->mostrar("formularios",$datos);
        
//        foreach ($resultado as $key => $value) {
//            if(strcmp("int",$value->getTpo()==0)||strcmp("double",$value->getTpo()==0)||strcmp("text",$value->getTpo()==0)){
//                $tipo="text";
//            }else{$tipo=$value->getTpo();}
//      }  
}
}

function ingresarAtributo() {
    error_reporting(0);
    $mensage="";
    $tpl=new Template();
    $titulo="Estudios Médicos";
    if($_POST['nombre']){
    $atr=new atributo();
    $atr->setNombre($_POST['nombre']);
    $atr->setTipo($_POST['selector']);
    $atr->setCalculado(0);
    if($atr->ingresarAtributo()){
        header("Location: index.php");
    } else{
  $mensage="Error al ingresar atributo. Verifique.";        
    }    
  }
                 $form=new formulario();
          $resultados=$form->traerFormularios();
          if($resultados!=null){
          foreach ($resultados as $key => $value) {
         $formularios[]=$value;
          }}
        $datos=array(
            "atributos" => $resultado,
            "mensage" => $mensage
        );
   $tpl->asignar( "formularios", $formularios);
        $tpl->asignar("titulo", $titulo);
        $tpl->mostrar("ingresarAtributo",$datos);
}


    function ingresarFormulario() {
         error_reporting(0);
  $dato=$_POST;
$cant=  count($dato);
$id=0;
$con=0;
foreach ($dato as $key => $value){
    if($con==0){
        $form=new formulario();
        $form->setNombre($value);
        $form->setVersion('0.1.0');
        $id=$form->insertarFormulario();
    }
    else
    if($con>0){
        $fo_att=new form_attr();
        $atr=new atributo();
        $ida=$atr->devolverId($key);
        $fo_att->setId_form($id);
        $fo_att->setId_atributo($ida);
        $fo_att->insertarFormulario();
    }
    $con=$con+1;
}
 header("Location: index.php");
}

    function crearFormulario() {
        error_reporting(0);
            $mensage="";
    $tpl=new Template();
    $titulo="Estudios Médicos";
    if($_POST['nom_formulario']){
       $dato=$_POST;
$cant=  count($dato);
$id=0;
$con=0;
$version=$_POST['version'];
foreach ($dato as $key => $value){
    if($con<1){
        $form=new formulario();
        $form->setNombre($_POST['nom_formulario']);
        $form->setVersion($version);
        $id=$form->insertarFormulario();
    }
    else
    if($con>0){
        $fo_att=new form_attr();
        $atr=new atributo();
        $ida=$atr->devolverId($key);
        $fo_att->setId_form($id);
        $fo_att->setId_atributo($ida);
        $fo_att->insertarFormulario();
    }
    $con=$con+1;
    }
    
    }
      $atr=new atributo();            
 $resultado=$atr->traerAtributos();
 if($resultado==null){
          $mensage="Aun no hay atributos.<br> Ingrese atributos en la base de datos.";  
        }
                $form=new formulario();
          $resultados=$form->traerFormularios();
          if($resultados!=null){
          foreach ($resultados as $key => $value) {
         $formularios[]=$value;
          }}
        $datos=array(
            "atributos" => $resultado,
            "mensage" => $mensage
        );
   $tpl->asignar( "formularios", $formularios);
        $tpl->asignar("titulo", $titulo);
        $tpl->mostrar("crearFormulario",$datos);
     
}

function cargarDatos(){

    
}
