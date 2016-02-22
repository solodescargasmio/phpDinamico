<?php /* Smarty version Smarty-3.1.20, created on 2016-02-22 16:05:34
         compiled from "vistas\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2243556c797900f4245-47633952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de094967d7aa623ea8b6d24728da777e7e392931' => 
    array (
      0 => 'vistas\\index.tpl',
      1 => 1456153525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2243556c797900f4245-47633952',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_56c79790225518_56066372',
  'variables' => 
  array (
    'titulo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c79790225518_56066372')) {function content_56c79790225518_56066372($_smarty_tpl) {?><!DOCTYPE html>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>

<body>
    <?php echo $_smarty_tpl->getSubTemplate ("cabeza.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container-fluid" style="position: absolute;top: 120px;">
         <h1>Creo que la parte de crear los form de forma dinamica<br>Estaria casi solucionado</h1>
        
        
    </div>
</body>

</html><?php }} ?>
