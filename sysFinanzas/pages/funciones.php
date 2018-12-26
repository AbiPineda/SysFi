<?php
	function mensajes($mensaje,$tipo){
		if($tipo=='verde'){
			$tipo='alert alert-success';
		}elseif($tipo=='rojo'){
			$tipo='alert alert-danger';
		}elseif($tipo=='azul'){
			$tipo='alert alert-info';
		}elseif($tipo=='naranja'){
			$tipo='alert alert-warning';
		}
		return '<div class="'.$tipo.'" align="center">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>'.$mensaje.'</strong>
            </div>';
	}
function formato($valor){
		return number_format($valor,2,".",",");
	}
        ?>
