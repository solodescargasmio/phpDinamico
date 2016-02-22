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
} );

});
</script> 
</head>

<body>
    {include file="cabeza.tpl"}
    <div class="container-fluid" style="position: absolute;top: 120px;">
        {if isset($mensage)}{$mensage}{/if}
        <form style="width: 500px;" method="POST">
            
            <fieldset><legend>{if isset($nombreform)}{$nombreform|upper}{/if}</legend></fieldset>
            {if isset($atributos)}
                {foreach from=$atributos item=atributo}
              <div class="form-group">
    <label for="nombre" class="col-lg-2 control-label">{$atributo->getNombre()|upper}</label>
    <div class="col-lg-10">
        {if $atributo->getTipo()=="int" || $atributo->getTipo()=="double" || $atributo->getTipo()=="text"|| $atributo->getTipo()=="float"}
      <input type="text" class="form-control" name="{$atributo->getNombre()}" id="" required="">
      {elseif $atributo->getTipo()=="date"}
          <input type="text" class="form-control" name="{$atributo->getNombre()}" id="datepicker" required="">
          {else}
           <input type="{$atributo->getTipo()}" class="form-control" name="{$atributo->getNombre()}" id="{$atributo->getNombre()}">
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
 
    </div>
 {include file="fecha.tpl"}
</body>

</html>