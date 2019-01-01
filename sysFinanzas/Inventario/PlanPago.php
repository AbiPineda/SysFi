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
                                        <form method="get" action="" enctype="multipart/form-data" name="form1" id="form1">
                                        
                                        <div class="table-responsive">
         <table class="table table-striped" id="tabla">
    <thead>
      <th><div>Código</div></th>
      <th><div>Nombre</div></th>
      <th><div>Marca</div></th>
      <th><div>Valor</div></th>
      
     <tbody class="buscar"> 
     <br>
    <?php
        $sacar1 = mysqli_query($conexion, "SELECT * FROM articulos");
            while ($fila = mysqli_fetch_array($sacar1)) {
                $cod=$fila['codigo'];
                $nom=$fila['nombre'];  
                $marca=$fila['marca'];
                $valor=$fila['valor'];
                      
        ?> 
        <tr>
                <td data-title="Relea"><?php echo $cod; ?></td>
                <th scope="row"><?php echo $nom; ?></th>
                 <th scope="row"><?php echo $marca; ?></th>
                  <th scope="row"><?php echo $valor; ?></th>
                
                </td>

       <?php  }?>
      
      </tr>

    </tbody>  
    </thead>
    
  </table>
  

  
                                </form>
       <form>
        <div class="col-lg-4">
         <label style="color: black">Articulo Seleccionado<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="insumo" name="insumo"><br>
          <br>
          <input type="text" class="form-control" id="valor" name="valor">
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div></form>

             <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                    <button type="button" class="btn btn-primary" name="btnGuardar" id="btnGuardar" onClick="agregarTabla()">  <i class="fa fa-shopping-cart"></i> Consultar Articulo</button>
             
                </div>
                              
                                 
                                           
                                <table id="tablaPP" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                          
                                            <th>ARTICULO</th>
                                            <th>PRECIO DE VENTA</th>
                                             <th>IVA</th>
                                             <th>TOTAL</th>
                                             <th>6 MESES</th>
                                              <th>12 MESES</th>
                                               <th>18 MESES</th>
                                                <th>24 MESES</th> 
                                                 <th>30 MESES</th> 
                                                  <th>36 MESES</th>                                           
                                     
                                            <th></th>                                          
                                        </tr>
                                    </thead>
                                     <tbody class="tabla_ajax"> 
  

    </tbody>
                                    
      


<?php
include_once '../Plantilla/inferior.php';
?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

  <script>
            var table = document.getElementById('tabla');
            for(var i = 1; i<table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
                    
                    document.getElementById("insumo").value = this.cells[1].innerHTML;
                    document.getElementById("valor").value = this.cells[3].innerHTML;
               };
            }
            </script>


             <script>
               function agregarTabla(){
                   //alert('si');
                    var articulo = $('#insumo').val();
                    var valor1 = $('#valor').val();
                    var iva = parseFloat(valor1) * 0.13;
                   var calculo = parseFloat(valor1) + parseFloat(iva);
                    var seis = parseFloat(calculo)/6;
                    var doce = parseFloat(calculo)/12;
                    var diesiocho = parseFloat(calculo)/18;
                    var veinticuatro = parseFloat(calculo)/24;
                    var treinta = parseFloat(calculo)/30;
                    var treintaseis = parseFloat(calculo)/36;

                   
                   
                  
                   
                    var tabla = $('#tablaPP');
                    
                    var datos = "<tr>"+
                            "<td>"+articulo+"</td>"+
                            "<td>"+valor1+"</td>"+
                            "<td>"+iva+"</td>"+
                            "<td>"+calculo+"</td>"+
                            "<td>"+parseFloat(seis).toFixed(2)+"</td>"+
                            "<td>"+parseFloat(doce).toFixed(2)+"</td>"+
                            "<td>"+parseFloat(diesiocho).toFixed(2)+"</td>"+
                            "<td>"+parseFloat(veinticuatro).toFixed(2)+"</td>"+
                            "<td>"+parseFloat(treinta).toFixed(2)+"</td>"+
                            "<td>"+parseFloat(treintaseis).toFixed(2)+"</td>"+
                            "</tr>";
                    
                    tabla.append(datos);
                    }
                    
                </script>

              