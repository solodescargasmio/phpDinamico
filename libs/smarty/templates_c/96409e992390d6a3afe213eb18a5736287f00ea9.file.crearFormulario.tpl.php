<?php /* Smarty version Smarty-3.1.20, created on 2016-03-08 19:35:08
         compiled from "vistas\crearFormulario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:572156c79b761312d9-11621522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96409e992390d6a3afe213eb18a5736287f00ea9' => 
    array (
      0 => 'vistas\\crearFormulario.tpl',
      1 => 1457462105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '572156c79b761312d9-11621522',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_56c79b763567e2_83344899',
  'variables' => 
  array (
    'titulo' => 0,
    'atributos' => 0,
    'valor' => 0,
    'mensage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c79b763567e2_83344899')) {function content_56c79b763567e2_83344899($_smarty_tpl) {?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
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
  
    $('#miform').hide();
  
		$("#mostrar").on( "click", function() {
			$('#miform').show(); //muestro mediante id 
     
		 });
		$("#ocultar").on( "click", function() {
                         $('#miform').hide();

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
                <script>
        $(function() {
            var $fieldset = $('<fieldset>');    
    var $form = $("#my-dynamic-form");
    $(' <div class="form-group">'+
                 '<label  class="col-sm-8 control-label">Nombre Formulario(*)</label>'+
    '<div class="col-lg-10">').appendTo($fieldset);
    $('<input type="text" name="nom_formulario" id="nom_formulario" onblur="control();" required="">').appendTo($fieldset);
      $('</div></div>')
        $fieldset.appendTo($form); 
          $(' <div class="form-group">'+
                 '<label  class="col-sm-8 control-label">Versíon(*)</label>'+
    '<div class="col-lg-10">').appendTo($fieldset);
    $('<input type="text" name="version" required="">').appendTo($fieldset);
      $('</div></div>')
        $fieldset.appendTo($form); 
    $('.campo1').click( function(){

            var $dato= $(".campo",this).val();
            var $dato1= $(".valor",this).val();

       da=recorrerDom($dato);
       if(da==0){ //si son distintos lo agrego
        $(' <div class="form-group" id="'+ $dato +'">'+
                 '<label  class="col-sm-8 control-label">'+ capitalize($dato) +'</label>'+
    '<div class="col-lg-10">').appendTo($fieldset);
        $('<input type="text" id="'+ $dato +'" name="'+ $dato +'" value="'+ $dato1 +'" readonly=>').appendTo($fieldset);
        $('<input type="button" id="'+ $dato +'" value="-" style="color: red;" name="eliminar" ident="'+ $dato +'" onclick="eliminarElementoDom()"></div></div>').appendTo($fieldset);
        $fieldset.appendTo($form);}
    else{ //si son iguales mando el alert e impido que un boludo ingrese dos veces el mismo atributo
        alert('El atributo que intenta agregar, ya existe en el formulario.');
    }
           
    });
 
}); 
$(function() {
    $('.version1').click( function(){
            var $datove= $(".formu",this).val();
        document.getElementById("nom_formulario").value=$datove;    
        });
    });



 function recorrerDom(valor) { 
    va=0;
    //recorro todos los label y si alguno tiene el mismo texto no le permito ingresar el atributo
        $("#my-dynamic-form label").each(function (idx, el){
  //$(el).html() aca obtengo el texto en los labels que estan en mayuscula
  //capitalize(valor) convierto a mayuscula el nombre del atributo q quiero ingresar
         if($(el).html()==capitalize(valor)){     
         va=1;    
         }

     });
    return va;
    }

function eliminarElementoDom() {
 $("input[type='button']").on('click',function(){
     dat=$(this).attr('ident');  
        $("#my-dynamic-form input").each(function (idx, el){
     if($(el).attr('name')==dat){
         va=$(el).attr('name');
       $("#my-dynamic-form input").remove("#"+va+"");
        $("#my-dynamic-form div").remove("#"+va+"") 
     };

     });
// 
    }
     )};
//function ver_data_estado() 
//{ 
//alert("boton presionado | ID: "+$(this).attr('ident')); 
//} 

function capitalize(s)//convierte minusculas a Mayusculas
{
    return s.toUpperCase();
}
     
        
        </script>     
<body>
   <?php echo $_smarty_tpl->getSubTemplate ("cabeza.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container-fluid">
          <div id="menus">
                <a href="#" onclick="mostrarDiv()"> <button id="mostrar"  class="btn btn-primary btn-group-sm">Agregar Campo</button></a>
   <a href="#" onclick="mostrarDiv()"> <button id="ocultar"  class="btn btn-primary btn-group-sm">Ocultar Tabla de Atributos</button></a>
   <a href="nuevaVersion.php" > <button id="ver"  class="btn btn-primary btn-group-sm">Nueva Version</button></a> 
      
       <form id="miform" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
           <br> <table class="table-responsive" border="1">  
                <tr>
                  <td>Nombre y tipo Campo :</td>
               </tr>
<?php if (isset($_smarty_tpl->tpl_vars['atributos']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['valor'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valor']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['atributos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valor']->key => $_smarty_tpl->tpl_vars['valor']->value) {
$_smarty_tpl->tpl_vars['valor']->_loop = true;
?>
               <tr class="agregar">
                   <td class="campo1"><a style="cursor:pointer;"><input type="text" name="campo" class="campo" value="<?php echo $_smarty_tpl->tpl_vars['valor']->value->getNombre();?>
" hidden=""><?php echo $_smarty_tpl->tpl_vars['valor']->value->getNombre();?>

                      &nbsp;&nbsp;&nbsp; &nbsp;<input type="text" name="valor" class="valor" value="<?php echo $_smarty_tpl->tpl_vars['valor']->value->getTipo();?>
" hidden=""><?php echo $_smarty_tpl->tpl_vars['valor']->value->getTipo();?>
</a></td>                 
                   </tr>
                   <?php } ?>
                   <?php } else { ?>
                       <?php echo $_smarty_tpl->tpl_vars['mensage']->value;?>

<?php }?>
           </table> 
      </form></div>
      <h6><font style="color: red;">Para eliminar atributo agregado,<br> doble click sobre el boton |-| al costado de cada atributo</font> </h6>
      
       <div id="avizo"></div>
      
      <h3>Formulario</h3>
      <form id="my-dynamic-form" method="POST"> 
           <div class="form-group">       
    <div class="col-lg-10">
   <input type="submit" value="Guardar Formulario" class="btn btn-primary btn-group-justified">
   </div></div><br><br>      
      </form>
         
       </div> 
         
</body>
</html><?php }} ?>
