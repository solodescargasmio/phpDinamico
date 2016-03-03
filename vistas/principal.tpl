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

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>

<body>
    {include file="cabeza.tpl"}
  <div class="container-fluid" style="background: #fff; opacity: 0.8; height: 100%;">
        <div class="row">
            {if isset($mensage)}
          {$mensage}
          {/if}
                {if is_null($cedula)}
                       
                    <input type="submit" value="<<Ingresar nuevo paciente>>" class="form-control btn btn-primary" onClick="window.location='formularios.php?nombre=paciente'">
                    
                    <h3><font style="color: #000;">Proyecto Final Estudios Medicos</h3>
                    <legend>Pacientes en Sistema</legend></font>
      <div class="form-group">
    <label for="nombre" class="col-lg-2 control-label">Seleccione cedula del paciente con el cual va a trabajar </label>
    <div class="col-lg-10">
        <select id="elejir"><option>Seleccione una opcion</option>
            {if isset($usuarios)}
    {foreach from=$usuarios item=usuario}
        {if $usuario->getId_attributo()=="1"}
        <option value="{$usuario->getValor()}">{$usuario->getValor()}</option>
           {/if}
        {/foreach}

    {/if}
        </select>
    </div>
  </div>
        {else}
            {if isset($usuarios)}
          <select id="elejir"> 
              <option value="{$cedula}">Ver avances</option>
        <option value="{$cedula}">{$cedula}</option>
    {/if}
        </select> 
          
       {/if}
        <div id="respuestauser"></div>
   </div>
   </div>
          <script src="bootstrap-hover-dropdown.js"></script>
  <script src="js/formToWizard.js" type="text/javascript"></script>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
        $(function(){
	//Aqui se coge el elemento ciudad y con la propiedad .on que requiere dos  parametros : change (cuando el valor de ese id cambie, que es cuando se elige otra opcion en la desplegable)y ejecutar la siguiente funcion cuando se haga change
	$('#elejir').on('change', function(){
              user=$('#elejir').val();
                datatypo='idtraer='+user;//genero un array con indice
     $.ajax({
         url: 'controlarAjax.php',//llamo a la pagina q hace el control
         type:'POST',//metodo por el cual paso el dato
         data:datatypo,
             success: function (data) { //funcion q recoge la respuesta de la pagina q hace el control
                  $("#respuestauser").fadeIn(1000).html(data); //imprimo el mensaje en el div      
                
    }
     });     
    });  
    });
    </script>
</body>

</html>