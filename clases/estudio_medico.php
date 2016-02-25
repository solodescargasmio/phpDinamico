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

       public function ingresarEstudio($id_usuario){  
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
         $dato=$fila->id_attributo;             
}      
       }
       return $dato;
 }
public function completarDatosEstudio(){
           $id_usuario=  Session::get('cedula');
              $id_estudio=  $this->ingresarEstudio($id_usuario);
           $id_form=  $this->getId_form();
           $id_att=  $this->getId_attributo();
           $val=  $this->getValor();
     $conexion=conectar::realizarConexion();
      $smtp=$conexion->prepare("INSERT INTO estudio_paciente (id_estudio,id_form) VALUES (?,?)" );
       $smtp->bind_param("ii",$id_estudio,$id_form);
       $smtp->execute();
       $res=false;
       if($conexion->affected_rows>0){
       $res=true;
       }
       $ok=$this->completarDatos($id_estudio, $id_att, $valor);
       return $ok;
 }
public function completarDatos($id_estudio,$id_att,$valor){
     $conexion=conectar::realizarConexion();
      $smtp=$conexion->prepare("INSERT INTO estudio_paciente (id_estudio,id_attributo,valor) VALUES (?,?,?)" );
       $smtp->bind_param("iis",$id_estudio,$id_att,$valor);
       $smtp->execute();
       $res=false;
       if($conexion->affected_rows>0){
       $res=true;
       }
       return $res;
 }
    
}
