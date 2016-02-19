<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('atributo.php');
require_once ('formulario.php');
require_once ('form_attr.php');
 function crearFormulario() {
        $nombre="paciente";
        $version="0.1";
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

