<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of form_attr
 *
 * @author Yo
 */
require_once ('./conexion/conectar.php');
class form_attr {
    private $id_form;
    private $id_atributo;
    function __construct() {
        
    }
    public function getId_form() {
        return $this->id_form;
    }

    public function getId_atributo() {
        return $this->id_atributo;
    }

    public function setId_form($id_form) {
        $this->id_form = $id_form;
    }

    public function setId_atributo($id_atributo) {
        $this->id_atributo = $id_atributo;
    }

function insertarFormulario() {
        $id_form=$this->getId_form();
        $id_atributo=$this->getId_atributo();
        $conexion=  conectar::realizarConexion();
        $smtp=$conexion->prepare("INSERT INTO form_attr (id_form,id_attributo) VALUES (?,?);");
        $smtp->bind_param("ii",$id_form,$id_atributo);
        $smtp->execute();
        $res=false;
        if($conexion->affected_rows>0){
            $res=true;
                      }
return $res;
        }
        
        public function traerFtatt() { 
            $id_form=$this->getId_form();
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT * FROM form_attr WHERE nom_form='".$id_form."'");
 while ($fila=$resultado->fetch_object()) {
         $form_att=new form_attr();
         $form_att->setId_atributo($fila->id_atributo);
            $form_attis[]=$form_att;          
}
        return $form_attis;
 }
 
 
  public function existenAtributos($id_form) {
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT count(*) FROM form_attr WHERE id_form=".$id_form);
   while ($fila=$resultado->fetch_object()) {
            foreach ($fila as $value) {
              $valor=$value;   
            }
                    
} 
        return $valor; 
      }
      
}
