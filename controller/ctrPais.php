<?php 
include_once("model/clsPais.php");
class ctrPais
{
	private $Pais;

	public function __construct()
	{
		$this->Pais = new clsPais();
	}




	public function Index()
	{
		$resultado = $this->Pais->Listar();
		return $resultado;
	}



	public function Agregar($nombre)
	{
		$this->Pais->setNombre($nombre);

		$resultado = $this->Pais->Insertar();

		return $resultado;
	}


	public function Ver($id)
	{
		$this->Pais->set("id", $id);
		$dato = $this->Pais->Ver();
		return $dato;
	}


	public function Eliminar($id)
	{
		$this->Pais->setId($id);

		$this->Pais->Eliminar();
	}


	public function Editar($id)
	{
		$this->Pais->setId($id);

		//$this->Pais->TraerporID();
		
		$this->Pais->Editar();
	}

}
?>