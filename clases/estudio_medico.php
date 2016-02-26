<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estudio_medico
 *
 * @author Yo
 */require_once ('./conexion/conectar.php');
class estudio_medico {
    private $id_estudio;
    private $id_usuario;
    private $id_form;
    private $id_attributo;
    private $valor;
    function __construct() {
        
    }
    public function getId_estudio() {
        return $this->id_estudio;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getId_form() {
        return $this->id_form;
    }

    public function getId_attributo() {
        return $this->id_attributo;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setId_estudio($id_estudio) {
        $this->id_estudio = $id_estudio;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setId_form($id_form) {
        $this->id_form = $id_form;
    }

    public function setId_attributo($id_attributo) {
        $this->id_attributo = $id_attributo;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

       public function ingresarEstudio(){ 
           $id_usuario= $this->getId_usuario();
     $conexion=conectar::realizarConexion();
      $smtp=$conexion->prepare("INSERT INTO estudio_paciente (id_usuario) VALUES (?)" );
       $smtp->bind_param("i",$id_usuario);
       $smtp->execute();
       $res=false;
       if($conexion->affected_rows>0){
       $res=true;
       }
    if($res){
              $resultado=$conexion->query("SELECT id_estudio FROM estudio_paciente WHERE id_usuario=".$id_usuario);   
 while ($fila=$resultado->fetch_object()) {
         $dato=$fila->id_estudio;             
}      
       }      
       return $dato;
 }
public function ingresarEstudioForm(){
           $id_estudio= $this->getId_estudio();
           $id_form=  $this->getId_form();
     $conexion=conectar::realizarConexion();    
      $smtp=$conexion->prepare("INSERT INTO estudio_form (id_estudio,id_form) VALUES (?,?)" );
       $smtp->bind_param("ii",$id_estudio,$id_form);
       $smtp->execute();
       $res=false;
       if($conexion->affected_rows>0){
       $res=true;
       }
       return $res;
 }
public function completarDatos(){
     $id_estudio= $this->getId_estudio(); 
    $id_att=  $this->getId_attributo();
     $valor=  $this->getValor();
     $conexion=conectar::realizarConexion();
      $smtp=$conexion->prepare("INSERT INTO estudio_atributo (id_estudio,id_attributo,valor) VALUES (?,?,?)" );
       $smtp->bind_param("iis",$id_estudio,$id_att,$valor);
       $smtp->execute();
       $res=false;
       if($conexion->affected_rows>0){
       $res=true;
       }
       return $res;
 }
    public function traerEstudioId($id_usuario) {
      
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT * FROM estudio_paciente WHERE id_usuario=".$id_usuario);   
 while ($fila=$resultado->fetch_object()) {
         $estudio=new estudio_medico();
         $estudio->setId_estudio($fila->id_estudio);
         $estudio->setId_usuario($fila->id_usuario);
         $estudio->setId_estudio($fila->id_form);
}

        return $estudio;
 } 
}
