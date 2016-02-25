<?php /* Smarty version Smarty-3.1.20, created on 2016-02-23 19:31:47
         compiled from "vistas\dependencia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2480756cc98916ea051-87374881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02b32823f164b4258280cc3218fabee614ed280c' => 
    array (
      0 => 'vistas\\dependencia.tpl',
      1 => 1456252302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2480756cc98916ea051-87374881',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_56cc98917de291_69995523',
  'variables' => 
  array (
    'titulo' => 0,
    'mensage' => 0,
    'formularios' => 0,
    'formulario1' => 0,
    'formulario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cc98917de291_69995523')) {function content_56cc98917de291_69995523($_smarty_tpl) {?><!DOCTYPE html>
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
    </head>   
<body>
   <?php echo $_smarty_tpl->getSubTemplate ("cabeza.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container-fluid" style="position: absolute;top: 120px;">
  <h3>Dependencias entre Formularios</h3>

   <div id="avizo"><?php echo $_smarty_tpl->tpl_vars['mensage']->value;?>
</div>
        <br>
        <form method="POST">
<?php if (isset($_smarty_tpl->tpl_vars['formularios']->value)) {?>
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <select name="selector">
    <?php  $_smarty_tpl->tpl_vars['formulario1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['formulario1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formularios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['formulario1']->key => $_smarty_tpl->tpl_vars['formulario1']->value) {
$_smarty_tpl->tpl_vars['formulario1']->_loop = true;
?>

                <option value="<?php echo $_smarty_tpl->tpl_vars['formulario1']->value->getNombre();?>
"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['formulario1']->value->getNombre(), 'UTF-8');?>
</option>
                   <?php } ?>
    </select><h5>Depende de que :</h5>
    </div>
  </div>
    
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
       <br><select name="selector1">

    <?php  $_smarty_tpl->tpl_vars['formulario'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['formulario']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formularios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['formulario']->key => $_smarty_tpl->tpl_vars['formulario']->value) {
$_smarty_tpl->tpl_vars['formulario']->_loop = true;
?>

                <option value="<?php echo $_smarty_tpl->tpl_vars['formulario']->value->getNombre();?>
"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['formulario']->value->getNombre(), 'UTF-8');?>
</option>
                   <?php } ?>
    
<?php }?></select><h5> esté completo</h5>
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
</html><?php }} ?>
