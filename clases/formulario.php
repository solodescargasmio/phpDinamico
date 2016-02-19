<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formulario
 *
 * @author Yo
 */
require_once ('./conexion/conectar.php');
class formulario {
    private $id_form;
    private $nombre;
    private $version;
    function __construct() {
        
    }
    public function getId_form() {
        return $this->id_form;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getVersion() {
        return $this->version;
    }

    public function setId_form($id_form) {
        $this->id_form = $id_form;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setVersion($version) {
        $this->version = $version;
    }

    function insertarFormulario() {
        $nombre=$this->getNombre();
        $version=  $this->getVersion();
        $conexion=  conectar::realizarConexion();
        $smtp=$conexion->prepare("INSERT INTO form (nombre,version) VALUES(?,?)");
        $smtp->bind_param("ss",$nombre,$version);
        $smtp->execute();
        $res=false;
        if($conexion->affected_rows>0){
            $res=true;
        }
        $resultado=$conexion->query("SELECT id FROM form WHERE nombre='".$nombre."'");
     while ($fila=$resultado->fetch_object()) {
         $dato=$fila->id;             
}
        return $dato;
 }

  public function traerFormularios() { 
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT * FROM form");   
 while ($fila=$resultado->fetch_object()) {
         $form=new formulario();
         $form->setId_form($fila->id);
         $form->setNombre($fila->nombre);
         $form->setVersion($fila->version);
            $formularios[]=$form;          
}
        return $formularios;
 }
 
  public function traerFormularioId() {
      $nombre=  $this->getNombre();
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT * FROM form WHERE nombre='$nombre'");   
 while ($fila=$resultado->fetch_object()) {
         $form=new formulario();
         $form->setId_form($fila->id);
         $form->setNombre($fila->nombre);
         $form->setVersion($fila->version);
         $form;          
}
        return $form;
 }
 
 
 
}
