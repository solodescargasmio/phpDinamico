<?php /* Smarty version Smarty-3.1.20, created on 2016-03-03 19:16:25
         compiled from "vistas\ingreso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1001556d5d884ec82e4-26066348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14dcf7f00ed18bfa5e2a59a1bc20212af3568a65' => 
    array (
      0 => 'vistas\\ingreso.tpl',
      1 => 1457028981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1001556d5d884ec82e4-26066348',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_56d5d88503d097_90440253',
  'variables' => 
  array (
    'titulo' => 0,
    'mensage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d5d88503d097_90440253')) {function content_56d5d88503d097_90440253($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap-hover-dropdown.js"></script>
   <script src="js/formToWizard.js" type="text/javascript"></script>
   <script src="js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
        $(function(){
	//Aqui se coge el elemento y con la propiedad .on que requiere dos  parametros : change (cuando el valor de ese id cambie, que es cuando se elige otra opcion en la desplegable)y ejecutar la siguiente funcion cuando se haga change
	$("#user").on('blur', function(){
            var id=$(this).val();
     datatypo='admin='+id;//genero un array con indice
             $.ajax({
         url: 'controlarAjax.php',//llamo a la pagina q hace el control
         type:'POST',//metodo por el cual paso el dato
         data:datatypo,
             success: function (data) { //funcion q recoge la respuesta de la pagina q hace el control
                  $("#respuestauser").fadeIn(1000).html(data); //imprimo el mensaje en el div      
                
    }
     }); 
      
    });  
           //  datatypo='user='+user;//genero un array con indice
      
    });
   </script>
</head>

<body>
    <?php echo $_smarty_tpl->getSubTemplate ("cabeza.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="container-fluid" style="background: #fff;">
      <font style="color: red;font-weight: bold;"><p>Si ingresa como Administrador podra crear formularios y agregar atributos en el sistema</p>
 <button id="mostrar"  class="btn btn-primary btn-group-sm" data-toggle="modal" data-target="#formulario">Administrador</button>
 <a href="#" onclick="mostrarDiv()"> <button id="mostrar"  class="btn btn-primary btn-group-sm" onclick="window.location='index.php?user=usuario'">Usuario</button></a>
       <div class="modal fade" id="formulario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:200px;">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4><font style="color: blue;">Ingrese usuario y contraseña</font></h4>  
                  <div id="respuestauser"></div>
                  </div>
                  <div class="modal-body">
                      <form method="POST">
                          
                          <div class="form-group">  
                              <label  class="col-sm-8 control-label">Usuario Administrador</label>
                                 <div class="col-lg-10">
   <input type="text" name="user" id="user">
                                 </div>
                          </div>
                          <div class="form-group">  
                              <label  class="col-sm-8 control-label">Password</label>
                                 <div class="col-lg-10">
                                     <input type="password" name="pass" id="pass">     
                                 </div>
                          </div>
                        
                  </div>
                  <div class="modal-footer">
               <div class="form-group">  
                              <label  class="col-sm-8 control-label"></label>
                                 <div class="col-lg-10">
                                     <input type="submit" value="Ingresar como Administrador" class="btn btn-primary btn-group-justified">
                                 </div>
                          </div>
                      </form> 
                  </div>
              </div>
          </div>   
       </div><br>
       <?php if (isset($_smarty_tpl->tpl_vars['mensage']->value)) {?><font style="color: red;font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['mensage']->value;?>
<?php }?></font>
   </div>
      
</body>

</html><?php }} ?>