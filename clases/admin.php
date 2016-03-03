<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Yo
 */require_once ('./conexion/conectar.php');
class admin {
    private $user;
    private $pass;
    function __construct() {
        
    }
    public function getUser() {
        return $this->user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

public function traerAdmin() { 
     $conexion=conectar::realizarConexion();
      $resultado=$conexion->query("SELECT * FROM administrador");   
 while ($fila=$resultado->fetch_object()) {
       $admin=new admin();
       $admin->setUser($fila->usuario);
       $admin->setPass($fila->pass);
}
        return $admin;
 }

}
