<?php 
include_once("model/clsPosicion.php");
class ctrPosicion
{
	private $Posicion;

	public function __construct()
	{
		$this->Posicion = new clsPosicion();
	}




	public function Index()
	{
		$resultado = $this->Posicion->Listar();
		return $resultado;
	}



	public function Agregar($nombre)
	{
		$this->Posicion->setNombre($nombre);

		$resultado = $this->Posicion->Insertar();

		return $resultado;
	}


	public function Ver($id)
	{
		$this->Posicion->set("id", $id);
		$dato = $this->Posicion->Ver();
		return $dato;
	}


	public function Eliminar($id)
	{
		$this->Posicion->setId($id);

		$this->Posicion->Eliminar();
	}


	public function Editar($id)
	{
		$this->Posicion->setId($id);

		//$this->Posicion->TraerporID();
		
		$this->Posicion->Editar();
	}

}
?>