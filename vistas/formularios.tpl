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
        });

});

       $(document).ready(function(){
           $("#fechatpl").hide();
  var form=document.getElementById("nomformulario").value;
           if(form=="paciente"){
           $("#id_paciente").keyup(function(){  
               con=0;
            var id=$(this).val();
            if(id=="."||id==","||id==""){
        alert("No utilice PUNTOS, COMAS o GUIONES EJ:12345678");
        return;
        }     
    });      
               
          $('input[name=id_paciente]').attr('placeholder','Solo numeros, NO ingrese puntos(.), comas(,) o guiones(_-) EJ:123 ');
       
               $(function(){
	//Aqui se coge el elemento y con la propiedad .on que requiere dos  parametros : change (cuando el valor de ese id cambie, que es cuando se elige otra opcion en la desplegable)y ejecutar la siguiente funcion cuando se haga change
	$("#id_paciente").on('blur', function(){
            var id=$(this).val();
     datatypo='user='+id;//genero un array con indice
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
        
        }else{
        $('input[name=id_paciente]').attr('readonly','readonly');
        }
           
            if($('input[name=altura]').length > 0){  //compruebo que el elemento existe       
   $('input[name=altura]').attr('placeholder','Con punto(.) EJ: 1.60, NO introdusca comas(,) ');
     }
      
        
  $('input[name=edad]').click(function(){
           var value=document.getElementById("datepicker").value;
          var dato=calcular_edad(value);
          document.getElementById("edad").value=dato;
    });
     if($('input[name=fecha_estudio]').length > 0){  //compruebo que el elemento existe       
   fecha_es();
     }
        $("#altura").blur(function(){
        var peso=document.getElementById("peso").value; 
        if(peso==""){
            alert("Por favor, rellene el campo peso");
        }else{  
        var altura=document.getElementById("altura").value;
        var imc=calcular_imc(peso,altura);
        document.getElementById("imc").value=imc.toFixed(2);
        }
    });
    
    
    
    });

    function fecha_es(){
       var fechaActual = new Date();
       var diaActual = fechaActual.getDate();
var mmActual = fechaActual.getMonth() + 1;
var yyyyActual = fechaActual.getFullYear();
    if(diaActual<10){
        var datof="0"+diaActual+"-"+mmActual+"-"+yyyyActual;
    }else
    if(mmActual<10)
    {
         var datof=diaActual+"-0"+mmActual+"-"+yyyyActual;
    }
    else
    if(mmActual<10 && diaActual<10)
    {
         var datof="0"+diaActual+"-0"+mmActual+"-"+yyyyActual;
    }
    
  //var datof=diaActual+"-"+mmActual+"-"+yyyyActual;
           document.getElementById("datepicker").value=datof;
     
        
    }
    
    function calcular_imc(peso,altura){
        var $indice=peso/(altura*altura);
        return $indice;
    }
    
    function calcular_edad(fecha) {
var fechaActual = new Date()
var diaActual = fechaActual.getDate();
var mmActual = fechaActual.getMonth() + 1;
var yyyyActual = fechaActual.getFullYear();
FechaNac = fecha.split("-");
var diaCumple = FechaNac[0];
var mmCumple = FechaNac[1];
var yyyyCumple = FechaNac[2];
//retiramos el primer cero de la izquierda
if (mmCumple.substr(0,1) == 0) {
mmCumple= mmCumple.substring(1, 2);
}
//retiramos el primer cero de la izquierda
if (diaCumple.substr(0, 1) == 0) {
diaCumple = diaCumple.substring(1, 2);
}
var edad = yyyyActual - yyyyCumple;

//validamos si el mes de cumpleaños es menor al actual
//o si el mes de cumpleaños es igual al actual
//y el dia actual es menor al del nacimiento
//De ser asi, se resta un año
if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
edad--;
}
return edad;
};

</script> 
</head>

<body>
    {include file="cabeza.tpl"}
    <div class="container-fluid" style="position: absolute;top: 25%;">
 
        <div id="respuestauser"></div>
       {if is_null($cedula) && $nombreform!="paciente"}
           <h4>
               <font style="color: red;font-weight: bold;">Debe ingresar un paciente nuevo en el formulario "PACIENTE", <br>
               seleccionar un paciente de la lista ó buscar ID de un paciente en la caja que dice 'cedula paciente'</font></h4>
       <div class="col-lg-offset-2 col-lg-10">
           <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="window.location='ingresar.php'">Atras</button>
    </div>
           {elseif $ok==false}
            <font style="color: red;font-weight: bold;">{$mensage}</font> 
             <div class="col-lg-offset-2 col-lg-10">
           <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="window.location='ingresar.php'">Atras</button>
    </div>
       {elseif !isset($estudios)}
           
           <form style="width: 500px;" role="form" method="POST" enctype="multipart/form-data">
            
            <fieldset><legend>{if isset($nombreform)}{$nombreform|upper}{/if}</legend></fieldset>
            <input type="text" name="nomformulario" value="{$nombreform}" id="nomformulario" hidden="">
            {if isset($atributos)}
                {foreach from=$atributos item=atributo}
                    <div class="form-group" style="border-width: 10px; background:#C8C0C0;">
    <label for="nombre" class="col-lg-2 control-label">{$atributo->getNombre()|upper}:</label>
    <div class="col-lg-10">
          
      {if $atributo->getTipo()=="double" || $atributo->getTipo()=="float"}
          {if $atributo->getObligatorio()=="0"}
              <input type="text" class="form-control" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}" required=""> 
      {else}
           <input type="text" class="form-control" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}"> 
          {/if}
        
        {elseif $atributo->getTipo()=="text"}
           {if $atributo->getTabla()=="1"}
          
            <select name="{$atributo->getNombre()}">
            
                {foreach from=$tablas item=opcion}
                    {if $opcion->getId_atributo()==$atributo->getId_attributo()}
                        <option value="{$opcion->getOpcion()}">{$opcion->getOpcion()|upper}</option>
                    {/if}
                  {/foreach}
               
            </select>
               {elseif $atributo->getObligatorio()=="0"}
                   <input type="text" class="form-control" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}" required="">              
                   {else}    
                  <input type="text" class="form-control" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}"> 
            {/if} 
            {elseif $atributo->getTipo()=="date"}
                {if $atributo->getObligatorio()=="0"}
          <input type="text" class="form-control" name="{$atributo->getNombre()}" id="datepicker" required="">
          {else}
              <input type="text" class="form-control" name="{$atributo->getNombre()}" id="datepicker">
          {/if}
                {elseif  $atributo->getTipo()=="int"}
              {if $atributo->getNombre()=="id_paciente" && $nombreform!="paciente"}
                  <input type="number" class="form-control" value="{$cedula}" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}" readonly="">
              {elseif $atributo->getObligatorio()=="0"}
                  <input type="number" class="form-control" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}" required="">
              {else}
                  <input type="number" class="form-control" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}">
              {/if}
              
        {elseif $atributo->getTipo()=="file"}
            {if  $atributo->getObligatorio()=="0"}
                <input type="{$atributo->getTipo()}" class="form-control" name="archivo[]" id="{$atributo->getNombre()}" required="">
            {else}
                <input type="{$atributo->getTipo()}" class="form-control" name="archivo[]" id="{$atributo->getNombre()}">
            {/if}
            
            {else}
             {if  $atributo->getObligatorio()=="0"}   
                 <input type="{$atributo->getTipo()}" class="form-control" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}" required="">  
            {else}
                <input type="{$atributo->getTipo()}" class="form-control" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}">  
                {/if}
             {/if}
    </div>
  </div>
            {/foreach}
 {/if}
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Alta Datos</button>
    </div>
  </div>       
        </form>
  
  {else}      
  

 <form style="width: 500px;" role="form" method="POST" enctype="multipart/form-data">   
            <fieldset><legend>{$nombreform|upper}</legend></fieldset>
        {foreach from=$estudios item=estudio}
            <input type="text" name="nomformulario" value="{$nombreform}" id="nomformulario" hidden="">
           <div class="form-group" style="border-width: 10px; background: #C8C0C0;">
                <label for="nombre" class="col-lg-2 control-label">{$estudio->getNom_attributo()|upper}</label>
    <div class="col-lg-offset-2 col-lg-10">
        {if $estudio->getNom_attributo()=="fecha_nacimiento" || $estudio->getNom_attributo()=="id_paciente" || $estudio->getNom_attributo()=="fecha_estudio" || $estudio->getNom_attributo()=="edad"}
            <input type="text" value="{$estudio->getValor()}" name="{$estudio->getNom_attributo()}" readonly="">
        {elseif $estudio->getTipo()=="float" || $estudio->getTipo()=="double" || $estudio->getTipo()=="int"} 
           <input type="text" value="{$estudio->getValor()}" name="{$estudio->getNom_attributo()}" id="{$estudio->getNom_attributo()}">   
        {else}
          <input type="{$estudio->getTipo()}" value="{$estudio->getValor()}" name="{$estudio->getNom_attributo()}" id="{$estudio->getNom_attributo()}">   
        {/if}
        </div>
  </div>
            {/foreach}
            <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
       <input type="submit" name="modificar" class="btn btn-primary btn-lg btn-block" value="Guardar Modificaciones">
       <br> <a href="ingresar.php" >   <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location:'ingresar.php'">Cancelar Modificacion</button> </a>
    </div>
  </div> 
        </form>
      
    
      
      
 {/if}
    </div>
  <div id="fechatpl">
 {include file="fecha.tpl"}</div>
</body>

</html>