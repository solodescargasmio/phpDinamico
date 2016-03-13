<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
 <script src="js/jquery.js" type="text/javascript"></script> 
 <script src="js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
  <script type="text/javascript">
  $(document).ready(function() {  
      $('#suggestions').hide();//oculto el div que muestra las opciones que vá encontrando
    //Al escribr dentro del input con id="service"
    $('#service').keyup(function(){
        //Obtenemos el value del input
        largo=1;
    
        var service = $(this).val();
        if(service.length>largo){
         var dataString = 'service='+service;   
    
        
         
        //Le pasamos el valor del input al ajax
        $.ajax({
            type: "POST",
            url: "autocompletar.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                var id="";
                $('a').on('click', function(){
                    //Obtenemos la id unica de la sugerencia pulsada
                    id= $(this).attr('id') ;

                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#service').val($('#'+id).attr('data')); 
       /////////////////////////////////////////////////////////////
       //de aca hasta las lineas de abajo es lo mismo que uso en principal
                      datatypo='idtraer='+id;//genero un array con indice
     $.ajax({
         url: 'controlarAjax.php',//llamo a la pagina q hace el control
         type:'POST',//metodo por el cual paso el dato
         data:datatypo,
             success: function (data) { //funcion q recoge la respuesta de la pagina q hace el control
                  $("#respuestauser").fadeIn(1000).html(data); //imprimo el mensaje en el div      
                
    }
     });  
    /////////////////////////////////////////////////////////////   
//  $('#service').val($('#'+id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
         
                   $('#suggestions').fadeOut(1000);
                  //  window.location='index.php?idpaciente='+id;
                });              
            }
        });}else{ $('#suggestions').fadeOut(1000);
    }
    }); 
  
}); 
   </script>
   <style>
.suggest-element{
    
margin-left:5px;
margin-top:5px;
width:350px;
cursor:pointer;
}
#suggestions {

width:350px;
height:150px;
overflow: auto;
}
</style>
 
 <script>
    // very simple to use!
    $(document).ready(function() {
      $('.js-activated').dropdownHover().dropdown();
    });
    
</script>
 <header class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
      {if isset($operador)}  
        <div id="cuadrado" class="nav navbar-nav navbar-left">
    <font style="font-weight: bold;">        
        <font style="color: #fff;">
        Usuario: {$operador}</font><br>
    <a tabindex="-1" class="navbar-brand" href="cerrarSesion.php">Cerrar sesion</a>
        </div>
        {/if}
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a tabindex="-1" class="navbar-brand" href="index.php">Ingreso y registro</a>       
        <a tabindex="-1" class="navbar-brand" href="ingresar.php">Pagina Principal</a> 
        
        
     {if isset($cedula)}
           
           <div id="cuadrado" class="nav navbar-nav navbar-right">
    <font style="font-weight: bold;">        
        <font style="color: #fff;">
        Paciente<br>
        Apellido: {$apellido}<br>Cedula : {$cedula}</font><br>
    <a tabindex="-1" class="navbar-brand" href="cerrar.php">Cambiar Paciente</a>
 </div>
  
        {/if}
           <form class="navbar-form navbar-right">
        <div class="form-group">  
                         <div class="col-lg-10">
         <input type="text" id="service" name="service" class="form-control" placeholder="cedula paciente" >
                                 </div>
                          </div>        
  <div id="suggestions"><font style="color:white;"></font></div>
        </form>
 
         <!--   <div style="float: right;" class="navbar-form navbar-right"><font style="color: #fff;">Apellido: {$apellido}<br>Cedula : {$cedula} <br>Edad : {$edad}</font></div>-->
</div> <!-- .container -->
        <div class="navbar-collapse nav-collapse collapse navbar-header">


       <ul class="nav navbar-nav">
            {if $operador=="comun"||$operador=="admin"} 
              <li class="dropdown">
            <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">Ingresar Datos<b class="caret"></b></a>
           <ul class="dropdown-menu">
          {if $formularios}
          {foreach from=$formularios item=value}
               <li class="dropdown">
                   <a tabindex="-1" href="formularios.php?nombre={$value->getNombre()}"> <font style="font-weight: bold;">{$value->getNombre()|upper}</font></a>
         </li>
          {/foreach}
         {/if}
            </ul> 
        </li>
          <li class="dropdown">    
           <a tabindex="-1" href="modificarPerfil.php">Modificar Datos Perfil</a>
            </li>
        {/if}
       {if $operador=="admin"}   
        <li class="dropdown">
            <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">Administrar Formularios<b class="caret"></b></a>
           <ul class="dropdown-menu">
      <font style="font-weight: bold;"><li><a tabindex="-1" href="crearFormulario.php">Crear Formularios</a></li>
              <li><a tabindex="-1" href="nuevaVersion.php">Nueva Version Formulario</a></li>
              <li><a tabindex="-1" href="atrapar.php">Crear Atributo</a></li>
              <li><a tabindex="-1" href="depende.php">Dependencia Formulario</a></li></font>
            </ul> 
        </li>
        {/if}
        {if isset($cedula)}
               <li class="dropdown">
            <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">Ver Fichas<b class="caret"></b></a>
           <ul class="dropdown-menu">
         <li class="dropdown">   
     <a tabindex="-1" href="exportarExcel.php">Como tablas en EXEL</a>
            </li>
             <li class="dropdown">    
     <a tabindex="-1" href="exportarExcel1.php">Como hojas en EXEL</a>
            </li>
           </ul>  
        </li>
            
            
            
            
              
        {/if}
        </ul>
        
      </div> <!-- .nav-collapse -->
    
  </header> <!-- .navbar -->