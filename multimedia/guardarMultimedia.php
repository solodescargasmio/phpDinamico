<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('./controladores/ctrl_dinamico.php');
require_once ('./clases/template.php');
require_once ('./clases/session.php');
require_once ('./clases/archivo.php');
require_once ('./conexion/configuracion.php');
require_once ('crearMKdir.php');
function subirDatos(){ 
    error_reporting(0);
 Session::init();
    $id_user=Session::get("cedula");
    $apell=Session::get("apellido");
    $edad=Session::get('edad'); 
    $tpl=new Template();
    $mensaje="";
    $titulo="Multimedia"; 
    $archivo=new archivo();
    $directorio = dirname(__FILE__).'/'.$id_user;

if (!file_exists($directorio)) {
    crearDir($id_user);
}
    if(isset($_POST['nombre'])){
$serv = $ruta=dirname(__FILE__).'/'.$id_user.'/';
$varia=$_POST['nombre'];
var_dump($serv);
  $exten=explode(".",$_FILES['archivo']['name']);
        $ex=  end($exten);
        $var=$varia.'.'.$ex;
  $ruta=$serv.$_FILES['archivo']['name'];
      
  	// Primero creamos un ID de conexión a nuestro servidor
	$cid = ftp_connect(FTP_HOST);
	// Luego creamos un login al mismo con nuestro usuario y contraseña
	$resultado = ftp_login($cid, FTP_USR,FTP_PASS);
	// Comprobamos que se creo el Id de conexión y se pudo hacer el login
	if ((!$cid) || (!$resultado)) {
		echo "Fallo en la conexión"; die;
	}
	// Cambiamos a modo pasivo, esto es importante porque, de esta manera le decimos al 
	//servidor que seremos nosotros quienes comenzaremos la transmisión de datos.
	ftp_pasv ($cid, true) ;
	// Nos cambiamos al directorio, donde queremos subir los archivos, si se van a subir a la raíz
	// esta por demás decir que este paso no es necesario. 
	ftp_chdir($cid, $$id_user);
	// Tomamos el nombre del archivo a transmitir, pero en lugar de usar $_POST, usamos $_FILES que le indica a PHP
	// Que estamos transmitiendo un archivo, esto es en realidad un matriz, el segundo argumento de la matriz, indica
	// el nombre del archivo
	$local =$var;
	// Este es el nombre temporal del archivo mientras dura la transmisión
	$remoto = $_FILES["archivo"]["tmp_name"];
	// Juntamos la ruta del servidor con el nombre real del archivo
	$ruta = $serv.$local;
		// Verificamos si ya se subio el archivo temporal
		if (is_uploaded_file($remoto)){
                       //guardamos nombre en base de datos        
                  if(strcasecmp($ex, "jpg")==0){
             $newpng =$varia.'.png'; 
             $png = imagepng(imagecreatefromjpeg($_FILES['archivo']['tmp_name']), $newpng);
             $ruta = $serv.$png;
             copy($remoto, $ruta);
             $ex="png";
                  }else
                   if(strcasecmp($ex, "gif")==0){
             $newpng =$varia.'.png'; 
             $png = imagepng(imagecreatefromgif($_FILES['archivo']['tmp_name']), $newpng);
             $ruta = $serv.$newpng;
             copy($remoto, $ruta);
             $ex="png";    
             }else
                         if(strcasecmp($ex, "bmp")==0){
             $newpng =$varia.'.png'; 
             $png = imagepng(imagecreatefromwbmp($_FILES['archivo']['tmp_name']), $newpng);
             $ruta = $serv.$png;
             copy($remoto, $ruta);
             $ex="png";           
                         }else
                            if(strcmp($ex,"avi")==0||strcmp($ex,"mp4")==0||strcmp($ex,"wmv")==0||strcmp($ex,"mkv")==0||strcmp($ex,"3gp")==0){
              copy($remoto, $ruta);  
         $video=exec("ffmpeg -i ".$remoto." -ss 00:00:00 -t 00:01:00 -async 1 ./multimedia/$id_user/".$varia.".webm");
               //  exec("ffmpeg -i ".$remoto." -vcodec copy -ss 1 -t 120 -acodec ".$varia.".webm 2>&1"); 
          $ruta = $serv.$video; 
         copy($remoto, $ruta);
         }
         ////-vcodec copy -ss 1 -t 120 -acodec //corta los videos
                          //  exec("ffmpeg -i ".$remoto." ./multimedia/$id_user/".$varia.".webm 2>&1");
                // copiamos el archivo temporal, del directorio de temporales de nuestro servidor a la ruta que creamos	  
                        $archivo->setId_usuario($id_user);
                        $archivo->setNombre($varia);
                        $archivo->setExtension($ex);
                        if($archivo->insertarArchivo()){}else{
                            $mensaje="Error al guardar archivo, verifique";
                        }
                      
		}
		// Sino se pudo subir el temporal
		else {
			echo "no se pudo subir el archivo " . $local;
		}
	//}
	//cerramos la conexión FTP
	ftp_close($cid);
  
}

$archivos=$archivo->listarArchivos($id_user);
//$imagen=$archivo->mostrarArchivo($id_user,$_POST['cursos']);
//
   $datos=array(
       'archivos' => $archivos,
       'imagen' => $imagen,
        'mensaje' => $mensaje,
        'titulo' => $titulo,
    );
     $tpl->asignar('edad', $edad);
    $tpl->asignar('cedula', $id_user);
    $tpl->asignar('apellido', $apell);
    $tpl->mostrar("multimedia", $datos); 
                } 
