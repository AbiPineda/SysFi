<?php

class departamento {
  private $iddepartamento;
  private $nombre;
  private $correlativo;
  
  function __construct() {

  }
  function getIddepartamento() {
      return $this->iddepartamento;
  }

  function getNombre() {
      return $this->nombre;
  }

  function getCorrelativo() {
      return $this->correlativo;
  }

  function setIddepartamento($iddepartamento) {
      $this->iddepartamento = $iddepartamento;
  }

  function setNombre($nombre) {
      $this->nombre = $nombre;
  }

  function setCorrelativo($correlativo) {
      $this->correlativo = $correlativo;
  }


}
?>