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
require_once ('./clases/datosPrecargados.php');
function principal(){  
     error_reporting(0);
    $mensage="";
    $tpl=new Template();
    $titulo="Estudios Médicos";
    $form=new formulario();
    $attr1=new atributo();
    $resultado=$form->traerFormularios();//obtengo todos los forms 
    //"Esto lo hago en todas las funciones para que cabeza.tpl siempre tenga los forms"
          if($resultado!=null){
          foreach ($resultado as $key => $value) {
         $formularios[]=$value;//guardo todos los formularios dinamicos para mostrarlos en cabeza.tpl
              }        
          }else{//si no existen formularios ingresados, ingreso todos los formularios precargados
              //con esto aseguro q los formularios y atributos se generen una sola ves
              cargarDatosPaciente();}
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
        $nombre=$_GET['nombre'];
        $atr=new atributo();
        $form=new formulario();
        $idf=$form->traerId($nombre);
        $fr_atr=new form_attr();
        $dat=$fr_atr->existenAtributos($idf);

        if($dat>0){
        $resultado=$atr->traerAtributosForm($idf);
          
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
$nombre=$_POST['nom_formulario'];
$version=$_POST['version'];
$form=new formulario();
        $form->setNombre($nombre);
        $form->setVersion($version);
        $idf=$form->insertarFormulario();//al guardar el for obtengo al id del form
         $fo_att=new form_attr();
        $fo_att->setId_form($idf); 
foreach ($dato as $key => $value){    
 if((strcmp($key, 'nom_formulario')==0)||(strcmp($key, 'version')==0)){ }
 else{ 
        $attr=new atributo();
        $ida=$attr->devolverId($key);//obtengo el id del atributo
        $fo_att->setId_atributo($ida); 
        $fo_att->insertarFormulario();
    }

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

function nuevaVersion(){
      error_reporting(0);
            $mensage="";
    $tpl=new Template();
    $titulo="Estudios Médicos";
    if($_POST['nom_formulario']){
       $dato=$_POST;
$cant=  count($dato);
$id=0;
$con=0;
$nombre=$_POST['nom_formulario'];
$version=$_POST['version'];
$form=new formulario();
        $form->setNombre($nombre);
        $form->setVersion($version);
        $idf=$form->insertarFormulario();
         $fo_att=new form_attr();
        $fo_att->setId_form($idf); 
foreach ($dato as $key => $value){    
 if((strcmp($key, 'nom_formulario')==0)||(strcmp($key, 'version')==0)){ }
 else{ 
        $attr=new atributo();
        $ida=$attr->devolverId($key);
        $fo_att->setId_atributo($ida); 
        $fo_att->insertarFormulario();
    }

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
        $tpl->mostrar("nuevaVersion",$datos);
     
    
}
