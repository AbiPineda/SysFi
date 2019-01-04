<?php

include_once '../Plantilla/encabezado.php';
include_once '../Plantilla/menuLateral.php';
include_once '../conexion/php_conexion.php';
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
                        <input type="text" class="redondeado" id="buscador" onkeyup="myFunction()" placeholder="Buscar..">
                        <div class="table-responsive">
                            <table width="100%" border="0">

                                <tr>
                                    <td width="50%">
                                        <div align="right">
                                            <form method="get" action="" enctype="multipart/form-data" name="form1" id="form1">

                                                <div class="table-responsive">
                                                    <div class="scroll-window-wrapper">
                                                        <div class="scroll-window">
                                                            <table class="table table-striped" id="tabla">
                                                                <thead>
                                                                <th><div>Código</div></th>
                                                                <th><div>Nombre</div></th>
                                                                <th><div>Marca</div></th>
                                                                <th><div>Valor</div></th>


                                                                <tbody class="buscar"> 
                                                                <br>
                                                                <?php
                                                                $sacar1 = mysqli_query($conexion, "SELECT articulos.idarticulos, articulos.codigo, articulos.nombre, articulos.marca, inventario.pv FROM articulos INNER JOIN inventario ON inventario.id_articulos = articulos.idarticulos");
                                                                while ($fila = mysqli_fetch_array($sacar1)) {
                                                                    $cod = $fila['codigo'];
                                                                    $nom = $fila['nombre'];
                                                                    $marca = $fila['marca'];
                                                                    $valor = $fila['pv'];
                                                                    ?> 
                                                                    <tr>
                                                                        <td data-title="Relea"><?php echo $cod; ?></td>
                                                                        <th scope="row"><?php echo $nom; ?></th>
                                                                        <th scope="row"><?php echo $marca; ?></th>
                                                                        <th scope="row"><?php echo $valor; ?></th>

                                                                        </td>

                                                                    <?php } ?>

                                                                </tr>

                                                                </tbody>  


                                                            </table>
                                                        </div> <!-- Div scroll-window -->
                                                    </div> <!-- Div scroll-window-wrapper-->

                                                </div>

                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                
                    <form>
                        <div class="col-lg-14">
                            <label style="color: black">Articulo Seleccionado<small class="text-muted" ></small></label>
                            <div class="input-group">                         
                                <input type="text" class="form-control" id="insumo" name="insumo" disabled><br>
                                <br>
                                <input type="text" class="form-control" id="valor" name="valor" disabled>
                                <br>

                                <input type="text" class="form-control" id="prima" name="prima" placeholder="Ingrese Prima ($)">
                                <br>
                                <input type="text" class="form-control" id="interes" name="interes" placeholder="Interes (%)">
                                <br>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
                                </div> 
                            </div>
                        </div>
                    </form>


                    <div class="row mb-10" style="float: right; margin-right: 425px; margin-top: 2px;">
                        <button type="button" class="btn btn-primary" name="btnGuardar" id="btnGuardar" onClick="agregarTabla()">  <i class="fa fa-shopping-cart"></i> Consultar Articulo</button>

                    </div>


                    <br>      
                    <table id="tablaPP" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center"><th colspan="8">PLAN DE CREDITO MENSUAL ($)</th></tr>
                            <tr>
                                <th>ARTICULO</th>
                                <th>PRECIO DE VENTA</th>
                                <th>6 MESES</th>
                                <th>12 MESES</th>
                                <th>18 MESES</th>
                                <th>24 MESES</th> 
                                <th>30 MESES</th> 
                                <th>36 MESES</th>                                           


                            </tr>

                        </thead>
                        <tbody class="tabla_ajax"> 


                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>




      


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

                   //se muestran en input
                   var articulo = $('#insumo').val();
                   var valor1 = $('#valor').val();
                   /////////////////////////////////////

                    var prima = $('#prima').val();
                   
                  
                    var costo = parseFloat($('#valor').val()) - parseFloat($('#prima').val());
                   
                   //si el iva es 13%, le sumo el iva al costo 
                    var iva = 0.13;
                    var iva1 = parseFloat(costo) * parseFloat(iva);
                    var costoConIva = parseFloat(costo) + parseFloat(iva1);

                    //sumarle el interes al costo con iva que tenia
                    var interes = parseFloat($('#interes').val())/100;
                    var interes1 = parseFloat(costoConIva) * parseFloat(interes);
                    var calculo = parseFloat(costo) + parseFloat(interes1);

                    var seis = parseFloat(calculo)/6;
                    var doce = parseFloat(calculo)/12;
                    var diesiocho = parseFloat(calculo)/18;
                    var veinticuatro = parseFloat(calculo)/24;
                    var treinta = parseFloat(calculo)/30;
                    var treintaseis = parseFloat(calculo)/36;

                    var tabla = $('#tablaPP');
                    
              
                    var datos = "<tr>"+
                            "<td>"+articulo+"</td>"+
                            "<td>"+costo+"</td>"+
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

                <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscador");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("th")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>       

              