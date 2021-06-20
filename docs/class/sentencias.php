<?php

require("conexion.php");



class sentencias extends conectar
{

	private $sentecia;

	private $num;

	private $con;

	private $err;

	private $array;



	public function consulta($sent)
	{

		switch ($this->C_gestor) {

			case 'pg':

				$this->sentecia = pg_query($this->conexion, $sent);

				return $this->sentecia;

				break;



			case 'mysql':

				$this->sentecia = mysqli_query($this->conexion, $sent);

				return $this->sentecia;

				break;



			case 'sqlserver':

				$this->sentecia = sqlsrv_query($this->conexion, $sent);

				return $this->sentecia;

				break;



			default:

				return 'error';

				break;
		}
	}



	public function numRegistros($sent)
	{



		switch ($this->C_gestor) {

			case 'pg':

				$this->sentecia = pg_query($this->conexion, $sent);

				$this->num = pg_num_rows($this->sentecia);



				return $this->num;

				break;



			case 'mysql':

				$this->sentecia = mysqli_query($this->conexion, $sent);

				$this->num = mysqli_num_rows($this->sentecia);



				return $this->num;

				break;



			case 'sqlserver':

				$this->sentecia = sqlsrv_query($this->conexion, $sent);

				$this->num = sqlsrv_num_rows($this->sentecia);



				return $this->num;

				break;



			default:

				return 'error';

				break;
		}
	}



	public function error()
	{



		switch ($this->C_gestor) {

			case 'pg':



				$this->err = pg_last_error($this->conexion);

				return $this->err;

				break;



			case 'mysql':

				$this->err = mysqli_error($this->conexion);

				return $this->err;

				break;



			case 'sqlserver':

				$this->err = sqlsrv_errors($this->conexion);

				return $this->err;

				break;



			default:

				return 'error';

				break;
		}
	}



	public function fetch_array($linea)
	{



		switch ($this->C_gestor) {

			case 'pg':



				$this->array = pg_fetch_array($linea);

				return $this->array;

				break;



			case 'mysql':

				$this->err = mysqli_fetch_array($linea);

				return $this->err;

				break;



			case 'sqlserver':

				$this->err = sqlsrv_fetch_array($linea);

				return $this->err;

				break;



			default:

				return 'error';

				break;
		}
	}
}
