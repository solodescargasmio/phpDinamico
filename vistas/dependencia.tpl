<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{$titulo}</title>
 <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
 <script src="js/jquery.js" type="text/javascript"></script>  
    </head>   
<body>
   {include file="cabeza.tpl"}
    <div class="container-fluid" style="position: absolute;top: 120px;">
  <h3>Dependencias entre Formularios</h3>

   <div id="avizo">{$mensage}</div>
        <br>
        <form method="POST">
{if isset($formularios)}
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <select name="selector">
    {foreach from=$formularios item=formulario1}

                <option value="{$formulario1->getNombre()}">{$formulario1->getNombre()|upper}</option>
                   {/foreach}
    </select><h5>Depende de que :</h5>
    </div>
  </div>
    
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
       <br><select name="selector1">

    {foreach from=$formularios item=formulario}

                <option value="{$formulario->getNombre()}">{$formulario->getNombre()|upper}</option>
                   {/foreach}
    
{/if}</select><h5> esté completo</h5>
 </div>
  </div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar dependencias</button>
    </div>
  </div>
        </form>
      </div>     

         
</body>
</html>