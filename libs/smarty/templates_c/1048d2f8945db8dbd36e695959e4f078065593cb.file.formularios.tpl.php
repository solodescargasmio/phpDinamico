<?php /* Smarty version Smarty-3.1.20, created on 2016-02-22 15:48:25
         compiled from "vistas\formularios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2749356c8a84b9c6719-18344112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1048d2f8945db8dbd36e695959e4f078065593cb' => 
    array (
      0 => 'vistas\\formularios.tpl',
      1 => 1456150551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2749356c8a84b9c6719-18344112',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_56c8a84bd59f87_24299369',
  'variables' => 
  array (
    'titulo' => 0,
    'mensage' => 0,
    'nombreform' => 0,
    'atributos' => 0,
    'atributo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c8a84bd59f87_24299369')) {function content_56c8a84bd59f87_24299369($_smarty_tpl) {?><!DOCTYPE html>
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
    <link href="./css/dateFechamio.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/dateFechamio.js"></script>

<script>
     $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd-mm-yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$(".datepicker").datepicker(
        {
firstDay: 1,
onSelect: function (date) {
},
} );

});
</script> 
</head>

<body>
    <?php echo $_smarty_tpl->getSubTemplate ("cabeza.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container-fluid" style="position: absolute;top: 120px;">
        <?php if (isset($_smarty_tpl->tpl_vars['mensage']->value)) {?><?php echo $_smarty_tpl->tpl_vars['mensage']->value;?>
<?php }?>
        <form style="width: 500px;" method="POST">
            
            <fieldset><legend><?php if (isset($_smarty_tpl->tpl_vars['nombreform']->value)) {?><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['nombreform']->value, 'UTF-8');?>
<?php }?></legend></fieldset>
            <?php if (isset($_smarty_tpl->tpl_vars['atributos']->value)) {?>
                <?php  $_smarty_tpl->tpl_vars['atributo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['atributo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['atributos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['atributo']->key => $_smarty_tpl->tpl_vars['atributo']->value) {
$_smarty_tpl->tpl_vars['atributo']->_loop = true;
?>
              <div class="form-group">
    <label for="nombre" class="col-lg-2 control-label"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['atributo']->value->getNombre(), 'UTF-8');?>
</label>
    <div class="col-lg-10">
        <?php if ($_smarty_tpl->tpl_vars['atributo']->value->getTipo()=="int"||$_smarty_tpl->tpl_vars['atributo']->value->getTipo()=="double"||$_smarty_tpl->tpl_vars['atributo']->value->getTipo()=="text"||$_smarty_tpl->tpl_vars['atributo']->value->getTipo()=="float") {?>
      <input type="text" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['atributo']->value->getNombre();?>
" id="" required="">
      <?php } elseif ($_smarty_tpl->tpl_vars['atributo']->value->getTipo()=="date") {?>
          <input type="text" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['atributo']->value->getNombre();?>
" id="datepicker" required="">
          <?php } else { ?>
           <input type="<?php echo $_smarty_tpl->tpl_vars['atributo']->value->getTipo();?>
" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['atributo']->value->getNombre();?>
" id="<?php echo $_smarty_tpl->tpl_vars['atributo']->value->getNombre();?>
">
        <?php }?>
    </div>
  </div>
            <?php } ?>
 <?php }?>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Alta Datos</button>
    </div>
  </div>
            
        </form>
 
    </div>
 <?php echo $_smarty_tpl->getSubTemplate ("fecha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>

</html><?php }} ?>
