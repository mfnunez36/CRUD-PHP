<?php
include_once("DB/clsConexion.php");
class clsPais
{
	private $id;
	private $nombre;
	private $con;

	public function __construct()
	{
		$this->con = new clsConexion();
	}


	public function __destruct(){}




	public function set($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}

	public function get($atributo)
	{
		return $this->$atributo;
	}






	public function Listar()
	{
		$sql = "SELECT * FROM pais";

		$resultado = $this->con->ConsultaResult($sql);

		return $resultado;

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}



	public function Insertar()
	{
		$sql = "INSERT INTO pais(nombre) VALUES ('{$this->nombre}')";

		$resultado = $this->con->Consulta($sql);

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}




	public function Eliminar()
	{
		$objConex = new clsConexion();

		$sql = "DELETE FROM pais WHERE (id = '{$this->id}')";

		$resultado = $this->con->Consulta($sql);

		$this->con->Liberar($resultado);
				
		$this->con->Cerrarconex();
	}
}
?>