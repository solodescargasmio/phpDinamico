<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
 <script src="js/jquery.js" type="text/javascript"></script> 
 <script src="js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
 <script>
    // very simple to use!
    $(document).ready(function() {
      $('.js-activated').dropdownHover().dropdown();
    });
    
</script>
 <header class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a tabindex="-1" class="navbar-brand" href="index.php">Inicio</a>
        <a tabindex="-1" class="navbar-brand" href="cerrar.php" style="  margin-left: auto; margin-right: auto;">Cerrar</a>

           <a tabindex="-1" class="navbar-brand" href="formularios.php">Formularios</a>         
 
           <form class="navbar-form navbar-right">
        <input type="text" id="service" name="service" class="form-control" placeholder="paciente" >
         <div id="suggestions"></div>
        </form>
 
         <!--   <div style="float: right;" class="navbar-form navbar-right"><font style="color: #fff;">Apellido: {$apellido}<br>Cedula : {$cedula} <br>Edad : {$edad}</font></div>-->

        <div class="navbar-collapse nav-collapse collapse navbar-header">


        <ul class="nav navbar-nav">
              <li class="dropdown">
            <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">Ingresar Datos<b class="caret"></b></a>
           <ul class="dropdown-menu">
          {if $formularios}
          {foreach from=$formularios item=value}
               <li class="dropdown">
               <a tabindex="-1" href="formularios.php?nombre={$value->getNombre()}">{$value->getNombre()|upper}</a>
         </li>
          {/foreach}
         {/if}
           
         
            </ul>  
        </li>

          <li class="dropdown">
            <a tabindex="-1" href="guardarmultimedia.php">Archivos</a>
          </li>

        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">FormulariosAdmin<b class="caret"></b></a>
           <ul class="dropdown-menu">
              <li><a tabindex="-1" href="crearFormulario.php">Crear Formularios</a></li>
              <li><a tabindex="-1" href="nuevaVersion.php">Nueva Version Formulario</a></li>
              <li><a tabindex="-1" href="atrapar.php">Ingresar Atributos</a></li>
              <li><a tabindex="-1" href="depende.php">Dependencias Formularios</a></li>
            </ul>  
        </li>
        <li class="dropdown">
            <a tabindex="-1" href="comentarios.php">Comentarios</a>
          </li>
           <li class="dropdown">
            <a tabindex="-1" href="imprimir.php">Ver Ficha</a>
          </li>
        </ul>
        
      </div> <!-- .nav-collapse -->
    </div> <!-- .container -->
  </header> <!-- .navbar -->