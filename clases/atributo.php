<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of atributo
 *
 * @author Yo
 */
require_once ('./conexion/conectar.php');
class atributo {
    private $id=0;
    private $nombre="";
    private $tipo="";
    private $calculado=0;
  
   public function __construct() {
    }
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getCalculado() {
        return $this->calculado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setTipo($tpo) {
        $this->tipo = $tpo;
    }

    public function setCalculado($calculado) {
        $this->calculado = $calculado;
    }

public function ingresarAtributo(){
     $nombre=$this->getNombre();
     $tipo=$this->getTipo();
     $calculado=$this->getCalculado();
     $conexion=conectar::realizarConexion();
      $smtp=$conexion->prepare("INSERT INTO atributo (nombre, tipo, calculado) VALUES (?,?,?)" );
       $smtp->bind_param("ssi",$nombre,$tipo,$calculado);
       $smtp->execute();
       $res=false;
       if($conexion->affected_rows>0){
       $res=true;}
       return $res;
 }
 
 public function traerAtributos() { 
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT * FROM atributo");   
 while ($fila=$resultado->fetch_object()) {
         $atr=new atributo();
         $atr->setNombre($fila->nombre);
         $atr->setTipo($fila->tipo);
         $atr->setCalculado($fila->calculado);
            $atributos[]=$atr;          
}
        return $atributos;
 }
 
 public function traerAtributosForm($id) { 
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT atributo.id_atributo,atributo.nombre,atributo.tipo FROM atributo,form_attr WHERE atributo.id_atributo=form_attr.id_atributo AND form_attr.id_form=".$id);   
      while ($fila=$resultado->fetch_object()) {
         $atr=new atributo();
         $atr->setId($fila->id_atributo);
         $atr->setNombre($fila->nombre);
         $atr->setTipo($fila->tipo);
            $atributos[]=$atr;          
}
        return $atributos;
 }
 
 
 public function devolverId($nombre) { 
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT id_atributo FROM atributo WHERE nombre='".$nombre."'");   
 while ($fila=$resultado->fetch_object()) {

         $dato=$fila->id_atributo;             
}
        return $dato;
 }
 
 public function ingresarAtributoPaciente(){
     $nombre="edad";
     $tipo="int";
     $calculado=1;
      $nombre1="imc";
     $tipo1="double";
     $calculado1=1;
       $nombre2="imc";
     $tipo2="double";
     $calculado2=1;
     $conexion=conectar::realizarConexion();
      $smtp=$conexion->prepare("INSERT INTO atributo (nombre, tipo, calculado) VALUES (?,?,?)" );
       $smtp->bind_param("ssi",$nombre,$tipo,$calculado);
       $smtp->execute();
       $res=false;
       if($conexion->affected_rows>0){
       $res=true;}
       return $res;
 }
}
