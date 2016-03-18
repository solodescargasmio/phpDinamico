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
 <script type="text/javascript">
/*$(document).ready(function(){
	 $('.campo1').click( function(){
            var id= $(".valor",this).val();
         datatypo='dependencia'   
    });
    });*/
    
    function control(){
        var ok=true;
         var dos=$('select[name=selector1]').val();
             var uno=$('select[name=selector]').val();
             if(uno==dos){
            alert("Los formularios deben de ser distintos"); 
            ok=false;
        }
        return ok;
    };
 </script>
    </head>   
<body>
   {include file="cabeza.tpl"}
  
   <div id="menuses">
{if isset($dependencias)}
    <table border="1" class="table table-striped">
        <tr class="success">
            <td>Depende</td>
            <td>De</td>
        </tr>
        {foreach from=$dependencias item=depen}
            <tr>  
                <td>{$depen->getDepende()|upper}</td> 
              <td>{$depen->getDe()|upper}</td> 
              <td><a style="cursor:pointer;" href="depende.php?ide={$depen->getId()}">
                      Eliminar</a></td>
             
         {/foreach}   
    </table>
{/if}
   </div>
    <div class="container-fluid" style="position: absolute;top: 25%;"> 
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
    </select><h5><font style="color: red;font-weight: bold;">Depende de que :</font></h5>
    </div>
  </div>
    
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
       <br><select name="selector1">

    {foreach from=$formularios item=formulario}

                <option value="{$formulario->getNombre()}">{$formulario->getNombre()|upper}</option>
                   {/foreach}
    
       {/if}</select><h5><font style="color: red;font-weight: bold;"> esté completo</font></h5>
 </div>
  </div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="return control();">Guardar dependencias</button>
    </div>
  </div>
        </form>
      </div>     

         
</body>
</html>