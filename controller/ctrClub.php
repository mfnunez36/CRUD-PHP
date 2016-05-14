<?php 
include_once("model/clsClub.php");
class ctrClub
{
	private $Club;

	public function __construct()
	{
		$this->Club = new clsClub();
	}




	public function Index()
	{
		$resultado = $this->Club->Listar();
		return $resultado;
	}



	public function Agregar($nombre)
	{
		$this->Club->setNombre($nombre);

		$resultado = $this->Club->Insertar();

		return $resultado;
	}


	public function Ver($id)
	{
		$this->Club->set("id", $id);
		$dato = $this->Club->Ver();
		return $dato;
	}


	public function Eliminar($id)
	{
		$this->Club->setId($id);

		$this->Club->Eliminar();
	}


	public function Editar($id)
	{
		$this->Club->setId($id);

		//$this->Pais->TraerporID();
		
		$this->Club->Editar();
	}

}
?>