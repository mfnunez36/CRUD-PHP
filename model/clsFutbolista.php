<?php
include_once("DB/clsConexion.php");
class clsFutbolista
{
	private $id;
	private $nombre;
	private $edad;
	private $posicion;
	private $pais;
	private $club;
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




//METODOS

	public function Listar()
	{
		$sql = "SELECT f.id, f.nombre as nombre, f.edad as edad, p.nombre as posicion, pa.nombre as pais, c.nombre as club, c.estadio as estadio
				FROM futbolista f INNER JOIN posicion p ON f.id_posicion = p.id INNER JOIN pais pa ON f.id_pais = pa.id INNER JOIN club c ON f.id_club = c.id";

		$resultado = $this->con->ConsultaResult($sql);

		return $resultado;

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();	
	}




	public function Ver()
	{
		$sql = "SELECT f.id as id, f.nombre as nombre, f.edad as edad, p.nombre as posicion, pa.nombre as pais, c.nombre as club, c.estadio
		FROM futbolista f INNER JOIN posicion p ON f.id_posicion = p.id INNER JOIN pais pa ON f.id_pais = pa.id INNER JOIN club c ON f.id_club = c.id 
		WHERE f.id = '{$this->id}' LIMIT 1";

		$resultado = $this->con->ConsultaResult($sql);

		$row = mysql_fetch_array($resultado);

		return $row;

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}





	public function Insertar()
	{
		$sql = "INSERT INTO futbolista(nombre, edad, id_posicion, id_pais, id_club) VALUES ('{$this->nombre}', '{$this->edad}', '{$this->posicion}', '{$this->pais}', '{$this->club}')";

		$resultado = $this->con->Consulta($sql);

		return true;

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}





	public function Editar()
	{
		$sql = "UPDATE futbolista SET nombre = '{$this->nombre}', edad = '{$this->edad}', id_posicion = '{$this->posicion}', id_pais = '{$this->pais}', id_club = '{$this->club}' 
				WHERE id = '{$this->id}'";// AND p.id = '$this->id_posicion' AND pa.id_pais = '$this->id_pais' AND c.id_club = '$this->id_club'

		$resultado = $this->con->Consulta($sql);

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}

	




	public function Eliminar()
	{
		$sql = "DELETE FROM futbolista WHERE (id = '{$this->id}')";

		$resultado = $this->con->Consulta($sql);

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}

}
?>