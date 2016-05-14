<?php
include_once("DB/clsConexion.php"); 
class clsClub
{
	private $id;
	private $nombre;
	private $estadio;
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
		$sql = "SELECT * FROM club";

		$resultado = $this->con->ConsultaResult($sql);

		return $resultado;

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}



	public function Ver()
	{
		$sql = "SELECT * FROM club WHERE id = '{$this->id}' LIMIT 1";

		$resultado = $this->con->ConsultaResult($sql);

		$row = mysql_fetch_array($resultado);

		return $row;

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}
	

	public function Insertar()
	{
		$sql = "INSERT INTO club(nombre, estadio) VALUES ('{$this->nombre}', '{$this->estadio}')";
		
		$resultado = $this->con->Consulta($sql);

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}

	

	

	public function Eliminar()
	{
		$sql = "DELETE FROM club WHERE (id = '{$this->id}')";

		$resultado = $this->con->Consulta($sql);

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}



	public function Editar()
	{
		$sql = "UPDATE club SET nombre = '{$this->nombre}', estadio = '{$this->estadio}' WHERE id = '{$this->id}'";

		$resultado = $this->con->Consulta($sql);

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}


}

?>