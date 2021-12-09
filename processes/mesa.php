<?php 
class Mesa{
   public $id;  
   public $capacidad;
   public $ubicacion;
   public $inicioreserva;
   public $finreserva;   
   public $idusu;
 public function __construct($id,$capacidad,$ubicacion,$inicioreserva,$finreserva,$idusu){
   $this->id=$id;   
   $this->capacidad=$capacidad;
   $this->ubicacion=$ubicacion;
   $this->inicioreserva=$inicioreserva;
   $this->finreserva=$finreserva;
   $this->idusu=$idusu;

 }

}