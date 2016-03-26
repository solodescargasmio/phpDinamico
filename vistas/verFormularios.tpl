<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{$titulo}</title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/dateFechamio.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/dateFechamio.js"></script>

</head>

<body>
    {include file="cabeza.tpl"}
    <div class="container-fluid" style="position: absolute;top: 25%;">
 
        <div id="respuestauser"></div>
       {if is_null($cedula)}
           <h4>
               <font style="color: red;font-weight: bold;">Debe ingresar un paciente nuevo en el formulario "PACIENTE", <br>
               seleccionar un paciente de la lista ó buscar ID de un paciente en la caja que dice 'cedula paciente'</font></h4>
       <div class="col-lg-offset-2 col-lg-10">
           <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="window.location='ingresar.php'">Atras</button>
    </div>
           {else}
  
           <h2><legend>{$nombreform|upper}</legend></h2>

        {foreach from=$estudios item=estudio}
            <div class="form-group">
                <label for="nombre" class="col-lg-2 control-label">{$estudio->getNom_attributo()|upper}</label>
    <div class="col-lg-offset-2 col-lg-10">
        {if $estudio->getTipo()=="file"}
            <div class="encuadro">
        {if $estudio->getExtencion()=="avi" || $estudio->getExtencion()=="mp4" || $estudio->getExtencion()=="wmv" || $estudio->getExtencion()=="mkv" || $estudio->getExtencion()=="3gp"}
  
            <video width="250" height="120" controls>
  <source src="./multimedia/{$cedula}/{$estudio->getValor()}" type="video/webm">
Tu navegador no soporta este tipo de video.
</video>   
        {elseif $estudio->getExtencion()=="png"}
   <img src="./multimedia/{$cedula}/{$estudio->getValor()}" width="250" height="120">
        {else}
            Tu navegador no soporta la visualizacion de este tipo de archivo.
      <img src="./multimedia/{$cedula}/{$estudio->getValor()}" width="250" height="120">      
        {/if}
        <a class="btn btn-primary btn-lg btn-block" href="descargas.php?archivo={$estudio->getNom_attributo()}& extension={$estudio->getExtencion()}">Descargar</a>
        </div>
        {/if}
        
      <legend>{$estudio->getValor()}</legend>
        </div>
  </div>
            {/foreach}
{/if}
    </div>
   

  <div id="fechatpl">
 {include file="fecha.tpl"}</div>
</body>

</html>