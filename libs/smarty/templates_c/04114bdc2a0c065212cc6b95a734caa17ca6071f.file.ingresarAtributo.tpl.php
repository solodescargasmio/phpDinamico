<?php /* Smarty version Smarty-3.1.20, created on 2016-02-20 20:16:00
         compiled from "vistas\ingresarAtributo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:562656c8bb70d1cef1-56969332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04114bdc2a0c065212cc6b95a734caa17ca6071f' => 
    array (
      0 => 'vistas\\ingresarAtributo.tpl',
      1 => 1455920817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '562656c8bb70d1cef1-56969332',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mensage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_56c8bb70e11134_82975266',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c8bb70e11134_82975266')) {function content_56c8bb70e11134_82975266($_smarty_tpl) {?><!DOCTYPE html>
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
    <link href="./css/dashboard.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/dateFechamio.js"></script>
    </head>
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ("cabeza.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container-fluid" style="position: absolute;top: 120px;">
        <?php if (isset($_smarty_tpl->tpl_vars['mensage']->value)) {?><?php echo $_smarty_tpl->tpl_vars['mensage']->value;?>
<?php }?>
        <form id="my-dynamic-form" method="post" enctype="multipart/form-data" class="form-horizontal">                            
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
      </div>
    </body>
</html><?php }} ?>
