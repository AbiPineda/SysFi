<?php
 include_once '../conexion/php_conexion.php';
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';

?>
<!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->

<head>
	<style>
   input {
     width: 250px;
     padding: 5px;
   }
   .redondeado { 
     border-radius: 5px;
   }

  table th {
  text-align: center;
}

table td {
  text-align: center;
}

body {
margin-bottom: 200%;
}


</style>
</head>
        <div id="page-wrapper"  align="center">
            <div class="container-fluid"  align="center">
                <div class="row" align="center">
          
           <div class="col-md-12">
           	<br>
                    <!-- Advanced Tables -->
                    <div class="panel panel-green">
                        <div class="panel-heading" align="center">
                             PLAN DE PAGO
                        </div>
                          

                        <div class="panel-body" align="center">
                    
                            <div class="table-responsive">
                              <table width="100%" border="0">
                               
                                  <tr>
                                    <td width="50%">
                                        <div align="right">
                                   
       <form action="planPago.php" method="POST">
        <div class="col-lg-4">
         <label style="color: black">       Ingrese una prima y un Interes<small class="text-muted" ></small></label>
          <div class="input-group">                         
        
          
         <input type="text" class="form-control" id="prima2" name="prima2" placeholder="Ingrese Prima ($)">
         <br>
         <input type="text" class="form-control" id="interes2" name="interes2" placeholder="Interes (%)">
         <br>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>


             <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
              <a target="_blank">
                    <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar">  <i class="fa fa-shopping-cart"></i> Ver Plan</button>
             </a>
                </div>
                              
                                 
                        </form>             <br>      
                     
                                    
      


<?php
include_once '../Plantilla/inferior.php';
?>

