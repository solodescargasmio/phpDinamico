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
 <link href="css/dashboard.css" rel="stylesheet">
    </head>
        <style type="text/css">
        body { font-family:Lucida Sans, Arial, Helvetica, Sans-Serif; font-size:13px; margin:20px;}
        #main { width:960px; margin: 0px auto; border:solid 1px #b2b3b5; -moz-border-radius:10px; padding:20px; background-color:#f6f6f6;}
        #header { text-align:center; border-bottom:solid 1px #b2b3b5; margin: 0 0 20px 0; }
        fieldset { border:none; width:500px;}
        legend { font-size:18px; margin:0px; padding:10px 0px; color:#b0232a; font-weight:bold;}
        label { display:block; margin:15px 0 5px;}
        input[type=text], input[type=password] { width:300px; padding:5px; border:solid 1px #000;}
 
    </style>
  

            <script>
             
$(document).ready(function(){
  $("#llamar").click(function(){
      var response[] =new Array();
      response= "{$atributos}";
$.each(response , function( index, obj ) { $.each(obj, function( key, value ) { alert('key + value'); }); }); 
     // alert(ultimoval);
        });
    $('#miform').hide();
  
		$("#mostrar").on( "click", function() {
			$('#miform').show(); //muestro mediante id 
                        
                        $ini=0;
                        dato='inicio='+0;
                        $.ajax({
                          url: "paginador.php",
                          type: 'POST',
                          data: dato,
                          success: function (data) {
                        $("#miform").fadeIn(1000).html(data);
                    }
                        });
                        
                        
                        $('#formversion').hide(); //oculto mediante id 
     
		 });
		$("#ocultar").on( "click", function() {
                         $('#miform').hide();
                          $('#formversion').show(); //muestro mediante id 
		});
  });
    
    function control(){
        nomb_form=document.getElementById("nom_formulario").value;
      datatypo='nom_formulario='+nomb_form;
          $.ajax({
         url: 'controlarAjax.php',//llamo a la pagina q hace el control
         type:'POST',//metodo por el cual paso el dato
         data:datatypo,
             success: function (data) { //funcion q recoge la respuesta de la pagina q hace el control
                  $("#avizo").fadeIn(1000).html(data); //imprimo el mensaje en el div      
                
    }
     });  
    }
     
        </script>
<body>
   {include file="cabeza.tpl"}
    <div class="container-fluid">
        <button id="llamar">Llamar</button>
        <div id="menus">
{if isset($atributos)}
    Cantidad a mostrar <input type="number" id="cant"> 
       <form id="miform" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
           <br> <table class="table-responsive" border="1">  
                <tr>
                  <td>Nombre y tipo Campo :</td>
               </tr>
              
               
               
    {foreach from=$atributos item=valor}
              
               <tr class="agregar">
                   <td class="campo1"><a style="cursor:pointer;"><input type="text" name="campo" class="campo" value="{$valor->getNombre()}" hidden="">{$valor->getNombre()}
                      &nbsp;&nbsp;&nbsp; &nbsp;<input type="text" name="valor" class="valor" value="{$valor->getTipo()}" hidden="">{$valor->getTipo()}</a>
                   <input type="text" name="id_att" class="id_att" value="{$valor->getId_attributo()}" hidden=""> 
                   </td>                 
                   </tr>
                   {/foreach}
                 </table> 
                 </form>
                  <br> <p>Pagina:{$actual} /{$totalpaginas}</p> 
            {if $actual<$totalpaginas && $actual==1}
                <a href="crearFormulario.php?ini={$limite}">Siguiente<img src="./imagenes/flechaderecha.JPG" width="30" height="20"></a> 
            {elseif $actual<$totalpaginas && $actual>1}
            <a href="crearFormulario.php?ini={$limite-3}"><img src="./imagenes/flechaizquierda.JPG" width="30" height="20">Anterior</a> ||    
            <a href="crearFormulario.php?ini={$limite}">Siguiente<img src="./imagenes/flechaderecha.JPG" width="30" height="20"></a>
            {elseif $actual==$totalpaginas && $actual>1}
            <a href="crearFormulario.php?ini={$limite-3}"><img src="./imagenes/flechaizquierda.JPG" width="30" height="20">Anterior</a>
            {else}
            <a href="#">Actual</a>     
            {/if} 
                   
                   {else}
                       {$mensage}
{/if}
</div>
</div>
         
</body>
</html>