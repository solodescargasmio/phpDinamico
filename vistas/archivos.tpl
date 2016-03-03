 <link href="css/dashboard.css" rel="stylesheet" type="text/css">
<div> <h4>Archivo actuales de paciente</h4>
    
    {if isset($archivos)}
    {foreach from=$archivos item=archivo}
        <div class="encuadro">
        <h5>{$archivo->getNombre()}</h5>
        {if strcmp($archivo->getExtension(), "jpg")==0 ||strcmp($archivo->getExtension(), "png")==0 }
<img src="./multimedia/{$cedula}/{$archivo->getNombre()}.{$archivo->getExtension()}" width="150" height="80">
        {else}
            
               <!-- <video id="conejito" controls preload="metadata">
                    <source src="./multimedia/{$cedula}/{$archivo->getNombre()}.{$archivo->getExtension()}" type="video/{$archivo->getExtension()}" />
    </video>-->

        <embed type="video/webm" pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" 
               src="./multimedia/{$cedula}/{$archivo->getNombre()}.webm" width="250" height="120" autostart="false" 
ShowStatusBar="1" ShowControls="1" DisplaySize="1">

        {/if}
        <a class="btn btn-primary btn-lg btn-block" href="descargas.php? archivo={$archivo->getNombre()}& extension={$archivo->getExtension()}">Descargar</a>

        </div>
    {/foreach}
    {/if}

</div>