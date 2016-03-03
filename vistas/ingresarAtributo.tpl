<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Atributo</title>
       <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/dateFechamio.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/dateFechamio.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myform2").hide();
             $("#mostrar").hide();
             $("#ocultar").show();
             
                $("#ocultar").click(function(){
                $("#myform1").hide();
                $("#mostrar").show();
                $("#myform2").show();
                $("#ocultar").hide();
            
    });
             
            $("#mostrar").click(function(){
                $("#myform2").hide();
                $("#ocultar").show();
                $("#myform1").show();
                $("#mostrar").hide();     
    });
      
           
    });
    </script>
    </head>
    <body>
        {include file="cabeza.tpl"}
    <div class="container-fluid" style="position: absolute;top: 120px;">
        {if isset($mensage)}{$mensage}{/if}
            <a href="#" onclick="mostrarDiv()" id="att"> <button id="mostrar"  class="btn btn-primary btn-group-sm">Atributo Simple</button></a>
   <a href="#" onclick="mostrarDiv()" id="att1"> <button id="ocultar"  class="btn btn-primary btn-group-sm">Atributo Compuesto </button></a>
   
        <form id="myform1" method="post" enctype="multipart/form-data" class="form-horizontal">                            
          <fieldset>  <label  class="col-sm-4 control-label">Atributo</label></fieldset>
    
      <div class="form-group">     
       <label  class="col-sm-4 control-label">Nombre del atributo</label>
                    <div class="col-sm-8">
  <input type="" name="nombre" id="nombre" placeholder="Ej: direccion (Sin espacios o caracteres raros)" class="success" size ="50">
                   </div> 
                </div> 
      
      <div class="form-group">     
       <label  class="col-sm-4 control-label">Agregar campo de tipo</label>
                    <div class="col-sm-8">
        <select name="selector">
        <option value="text">text</option>
        <option value="checkbox">checkbox</option>
        <option value="double">double</option>
        <option value="int">int</option>
        <option value="date">date</option>
        </select>
                   </div> 
                </div>   
      <input type="submit" value="Enviar" class="btn btn-primary btn-group-justified">
            </form>
    
        <form id="myform2" method="post" enctype="multipart/form-data" class="form-horizontal">                            
          <fieldset>  <label  class="col-sm-4 control-label">Tabla Selector</label></fieldset>
    
      <div class="form-group">     
       <label  class="col-sm-4 control-label">Nombre de la tabla</label>
                    <div class="col-sm-8">
  <input type="" name="nombre" id="nombre" placeholder="Ej: sexo (Sin espacios o caracteres raros)" class="success" size ="50">
                   </div> 
                </div> 
      
      <div class="form-group">     
       <label  class="col-sm-4 control-label">Agregar opciones de atributo</label>
                    <div class="col-sm-8">
                        <textarea name="selectortexto" placeholder="ej: masculino,   femenino"></textarea>
                        <font style="color: red;font-weight: bold;">   Separados por comas (',')</font>
                    </div> 
                </div>   
      <input type="submit" value="Enviar" class="btn btn-primary btn-group-justified">
            </form>
        
      </div>
    </body>
</html>