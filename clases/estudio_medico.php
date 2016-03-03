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
require_once ('atributo.php');
class estudio_medico {
    private $id_estudio;
    private $id_usuario;
    private $id_form;
    private $id_attributo;
    private $nom_attributo;
    private $tipo;
    private $valor;
    function __construct() {
        
    }
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

        public function getNom_attributo() {
        return $this->nom_attributo;
    }

    public function setNom_attributo($nom_attributo) {
        $this->nom_attributo = $nom_attributo;
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
    $id_att=  $this->getId_attributo();
    $id_form=  $this->getId_form();
     $valor=  $this->getValor();
     $conexion=conectar::realizarConexion();
      $smtp=$conexion->prepare("INSERT INTO estudio_atributo (id_estudio,id_form,id_attributo,valor) VALUES (?,?,?,?)" );
       $smtp->bind_param("iiis",$id_estudio,$id_form,$id_att,$valor);
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
 
   public function traerFormEstudioId($id_estudio,$id_form) {
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT * FROM estudio_atributo WHERE id_estudio=".$id_estudio." AND id_form=".$id_form);   
 while ($fila=$resultado->fetch_object()) {
         $atr=new atributo();
         $estudio=new estudio_medico();
         
         $estudio->setId_estudio($fila->id_estudio);
         $estudio->setId_form($fila->id_form);
         $estudio->setId_attributo($fila->id_attributo);
         $nom_att=$atr->devolverNombre($fila->id_attributo);
         $estudio->setNom_attributo($nom_att);
         $tipo=$atr->devolverTipo($fila->id_attributo);
         $estudio->setTipo($tipo);
         $estudio->setValor($fila->valor);
         
         $estudios[]=$estudio;
}
        return $estudios;
 }
 
  public function traerFormId_usuario($id_usuario,$id_form) {
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT estudio_atributo.id_estudio,estudio_atributo.id_form,estudio_atributo.id_attributo,estudio_atributo.valor FROM estudio_atributo,estudio_paciente WHERE estudio_paciente.id_estudio=estudio_atributo.id_estudio AND estudio_paciente.id_usuario=".$id_usuario." AND estudio_atributo.id_form=".$id_form);   
 while ($fila=$resultado->fetch_object()) {
         $estudio=new estudio_medico();
         $estudio->setId_estudio($fila->id_estudio);
         $estudio->setId_form($fila->id_form);
         $estudio->setId_attributo($fila->id_attributo);
         $estudio->setValor($fila->valor);
         $estudios[]=$estudio;
          }
        return $estudios;
 }
 
 public function traerPacientes(){
     
     $id_form=1;
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT * FROM estudio_atributo WHERE  id_form=".$id_form);   
 while ($fila=$resultado->fetch_object()) {
         $estudio=new estudio_medico();
         $estudio->setId_attributo($fila->id_attributo);
         $estudio->setValor($fila->valor);  
         $estudios[]=$estudio;
}
      return $estudios;
 }
 
 public function traerId($id_usuario) {   
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT id_estudio FROM estudio_paciente WHERE id_usuario=".$id_usuario);   
 while ($fila=$resultado->fetch_object()) {

         $dato=$fila->id_estudio;

}
        return $dato;
 } 
 
 public function traerFormEchos($id_usuario) {
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT DISTINCT id_form FROM estudio_atributo,estudio_paciente WHERE estudio_atributo.id_estudio=estudio_paciente.id_estudio AND estudio_paciente.id_usuario=".$id_usuario);   
 while ($fila=$resultado->fetch_object()) {
        
         $estudios[]=$fila->id_form;;
          }
        return $estudios;
 }
 
     public function traerPacientesCedula($id_user){
     $id_form=1;
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT * FROM estudio_atributo WHERE  id_form=".$id_form." AND valor=".$id_user);   
 while ($fila=$resultado->fetch_object()) {
         $estudio=new estudio_medico();
         $estudio->setId_attributo($fila->id_attributo);
         $estudio->setValor($fila->valor);  
         $estudios[]=$estudio;
}
      return $estudios;
 }
 
  public function traerLike($id_usuario) {
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT DISTINCT estudio_atributo.id_attributo,estudio_atributo.valor FROM estudio_atributo,estudio_paciente WHERE estudio_paciente.id_estudio=estudio_atributo.id_estudio AND estudio_paciente.id_usuario like '%".$id_usuario."%'");   
 while ($fila=$resultado->fetch_object()) {
         $estudio=new estudio_medico();
         $estudio->setId_attributo($fila->id_attributo);
         $estudio->setValor($fila->valor); 
         $estudios[]=$estudio;
          }
        return $estudios;
 }
 
 public function ok($id_usuario,$id_form) {
     $ok=false;
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT DISTINCT id_form FROM estudio_atributo,estudio_paciente WHERE estudio_atributo.id_estudio=estudio_paciente.id_estudio AND estudio_paciente.id_usuario=".$id_usuario);   
 while ($fila=$resultado->fetch_object()) {
        if($fila->id_form==$id_form){
         $ok=true;   
        }
          }
        return $ok;
 }
 
 public function actualizaciones($clave,$valor){
     $id_est=  $this->getId_estudio();
     $id_form=  $this->getId_form();
      $conexion=conectar::realizarConexion();
      $smtp=$conexion->prepare("UPDATE estudio_atributo SET valor='$valor' WHERE id_estudio=$id_est AND id_form=".$id_form." AND id_attributo=".$clave);
      $smtp->bind_param("siii",$valor,$id_est,$id_form,$clave);
      $smtp->execute();
      $res=false;
       if($conexion->affected_rows>0){
       $res=true;
       }
       return $res;
     
 }
 
 public function actualizar($datos){
     $ok=false;
    
 }
 
}
