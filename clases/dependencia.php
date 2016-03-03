<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dependencia
 *
 * @author Yo
 */ require_once ('./conexion/conectar.php');
class dependencia {
    private $id;
    private $depende;
    private $de;
    function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDepende() {
        return $this->depende;
    }

    public function getDe() {
        return $this->de;
    }

    public function setDepende($depende) {
        $this->depende = $depende;
    }

    public function setDe($de) {
        $this->de = $de;
    }

    
 function insertarDependencias($dato1,$dato2) {
        $conexion=  conectar::realizarConexion();
        $smtp=$conexion->prepare("INSERT INTO dependencia (depende,de) VALUES(?,?)");
        $smtp->bind_param("ii",$dato1,$dato2);
        $smtp->execute();
        $res=false;
        if($conexion->affected_rows>0){
            $res=true;
        }
        
         return $res;
         
        }
         public function traerDependencias(){
  $conexion=  conectar::realizarConexion();
         $resultado=$conexion->query("SELECT * FROM dependencia");       
         while ($row = $resultado->fetch_object()) {
             $tato=new dependencia();
             $tato->setId($row->id);
             $tato->setDepende($row->depende);
             $tato->setDe($row->de);
             $datos[]=$tato;
         }
         return $datos;
 }
 
 public function traerDepende($id){
  $conexion=  conectar::realizarConexion();
         $resultado=$conexion->query("SELECT * FROM dependencia WHERE depende=".$id);       
         while ($row = $resultado->fetch_object()) {
             $tato=$row->de;
         }
         return $tato;
 }
 
}
