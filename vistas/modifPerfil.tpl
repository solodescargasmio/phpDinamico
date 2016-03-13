<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{$titulo}</title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/dateFechamio.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/dateFechamio.js"></script>
    <script>
        
    </script> 
</head>

<body>
    {include file="cabeza.tpl"}
    <div class="container-fluid" style="position: absolute;top: 120px;">
        {if isset($mensage)}{$mensage}{/if}
        <div id="respuestauser"></div>
        {if isset($usuario)}{/if}
        <form style="width: 500px;" method="POST">
            <fieldset><legend>Mi Perfil</legend></fieldset>   
              <div class="form-group">
                   <label  class="col-sm-4 control-label">Nick</label>
    <div class="col-lg-offset-2 col-lg-10">
        <input type="text" name="viejo" value="{$usuario->getNick()}" hidden="">
        <input type="text" name="nick" value="{$usuario->getNick()}">
    </div>
  </div>
            
              <div class="form-group">
        <label  class="col-sm-4 control-label">Nombre</label>
    <div class="col-lg-offset-2 col-lg-10">
        <input type="text" name="nombre" value="{$usuario->getNombre()}"> </div>
  </div>
            
              <div class="form-group">
        <label  class="col-sm-4 control-label">Apellido</label>
    <div class="col-lg-offset-2 col-lg-10">
        <input type="text" name="apellido" value="{$usuario->getApellido()}"></div>
  </div>
            
              <div class="form-group">
          <label  class="col-sm-4 control-label">Email</label>
    <div class="col-lg-offset-2 col-lg-10">
        <input type="email" name="email" value="{$usuario->getEmail()}"></div>
  </div>
          
               <div class="form-group">
          <label  class="col-sm-4 control-label">Contraseña</label>
    <div class="col-lg-offset-2 col-lg-10">
        <input type="password" name="passw"></div>
  </div>
            
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Modificar Datos</button>
    </div>
  </div>
            
        </form>
 
    </div>
</body>

</html>