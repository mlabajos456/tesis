<?php
	class conectar{
		protected $C_HOST;
		protected $C_BASE;
		protected $C_PASS;
		protected $C_USER;
		protected $C_port;
		protected $C_gestor;
		public $conexion;

		public function conectar(){
			$this->C_HOST = "localhost";//
			$this->C_BASE = "encuesta";   //dbcacao,,prueba,bd_web_predios,dbalquiler
			$this->C_PASS = "";
			$this->C_USER = "root";//postgress,root,
			$this->C_port = "5432";//5432,,
			$this->C_gestor ="mysql";//   pg,mysql,sqlserver

			switch ($this->C_gestor) {
				case 'pg':
					$this->conexion =  pg_connect("host=".$this->C_HOST." port=".$this->C_port." dbname=".$this->C_BASE." user=".$this->C_USER." password=".$this->C_PASS."");
					if (pg_last_error($this->conexion)) {
					    printf('NO PUDO REALIZARCE LA CONEXION: ' . pg_last_error());
					}
					
					pg_query($this->conexion, "SET NAMES 'utf8'");
					break;

				case 'mysql':
					$this->conexion =  mysqli_connect($this->C_HOST,$this->C_USER,$this->C_PASS,$this->C_BASE);
						
					if (!$this->conexion) {
					    printf('NO PUDO REALIZARCE LA CONEXION: ' . mysqli_connect_errno() . PHP_EOL);
					}
					
					mysqli_query($this->conexion, "SET NAMES 'utf8'");
					break;	

				case 'sqlserver':
					$serverName = $this->C_HOST; //serverName\instanceName
					$connectionInfo = array( "Database"=>$this->C_BASE);
					$this->conexion = sqlsrv_connect($serverName, $connectionInfo);

					if($this->conexion) {
					     echo "Conexión establecida.<br />";
					}else{
					     echo "Conexión no se pudo establecer la CONECCION.<br />";
					     die( print_r( sqlsrv_errors(), true));
					}
					break;	
				
				default:
					# code...
					break;
			}

			
		}
	}
?>