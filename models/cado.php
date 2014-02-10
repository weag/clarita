<?php  

class Cado{
	private $host="localhost";
	private $user="root";
	private $password="root";
	private $engine="mysql";
	private $port="";
	private $dbname="claritadb";

	function conexion(){
		try {
		    $db=new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname","$this->user","$this->password");
		    return $db;
		} catch (PDOException $e) {
		    echo 'Falló la conexión: ' . $e->getMessage();
		    exit();
		}
	}

	public function task($dato){
		$db=$this->conexion();
		switch ($dato['accion']) {
			case 'select':
				$result=$db->prepare("select ".$dato['columns']." from ".$dato['table']." ".$dato['condicion']);
				$result->execute();
				return $result;
				break;
			case 'insert':
				$result=$db->query("insert into ".$dato['table']." values(null,".$dato['values'] .");");
				return $result;
			case 'update':
				$result=$db->query("update ".$dato['table']." set ".$dato['set']." ". $dato['condicion']);
				return $result;
			case 'delete':
				$result=$db->query("delete from ".$dato['table']." ".$dato['condicion']);
				return $result;
				break;
			case 'query':
				$result=$db->query($dato['query'] );
				return $result;
				break;
			default:
				$result=$db->query($dato['query'] );
				return $result;
				break;
		}
	}
	public function exec($dato){
		$db=$this->conexion();
		return $db->query($dato['query'] );
	}
}

?>