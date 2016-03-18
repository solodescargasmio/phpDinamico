 <?php 
               require_once './clases/atributo.php';
               require_once ('./clases/formulario.php');
               echo '<br> <table class="table-responsive" border="1">  ';   
               echo ' <tr>'; 
               echo '<td>Nombre y tipo Campo :</td>';    
              echo '</tr>';  

              
              
                 $con=0;
            $atr=new atributo();
            $form=new formulario();
            $con=$atr->contarAtributos();
            $totalpag=0;
           $fin=5; 
           $inicio=0;
           $actual=1;
           $ca=0; 
            foreach ($con as $value) {
             $ca=$value;   
            }
            if($_POST['inicio']){
                var_dump("dentro");exit();
                }else{
  
                
            
            
             $totalpag=  ceil($ca/5);
          $resultado=$atr->traerAtributosPaginados($inicio,$fin);
          if(isset($resultado)){
          foreach ($resultado as $key => $value) {
              echo '<tr class="agregar">';  
                echo '<td class="campo1"><a style="cursor:pointer;"><input type="text" name="campo" class="campo" value="'.$value->getNombre().'" hidden="">'.$value->getNombre();    
                echo ' &nbsp;&nbsp;&nbsp; &nbsp;<input type="text" name="valor" class="valor" value="'.$value->getTipo().'" hidden="">'.$value->getTipo().'</a>';         
                echo '<input type="text" name="id_att" class="id_att" value="'.$value->getId_attributo().'" hidden=""> ';    
                 echo '</td>';                    
                 echo ' </tr>';  
}
          }}
          echo '</table> ';
          ?>
          

