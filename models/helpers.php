<?php 
class Helpers{
	public function select( $data ){
		include_once("cado.php");
		$bd=new Cado();
		/*if ( isset($data['id']) ) {
			$data["condicion"]=" where id=".$data['id'].";";
		}*/
		$dato=array('accion'=>'select','table'=>$data["table"] ,'columns'=>"*",'condicion'=>$data["condicion"] );
		return $bd->task($dato);
		/*$cont=1;
		foreach ($query as $row) {
			$registros[$cont]=$row;
			$cont++;
		}
		return $registros;*/
	}
	public function query( $data ){
		include_once("cado.php");
		$bd=new Cado();
		$dato=array('accion'=>'query','table'=>$data["query"] );
		return $bd->task($dato);
	}
	public function update( $data ){
		include_once("cado.php");
		$bd=new Cado();
		$dato=array('accion'=>'update','table'=>$data["table"],'set'=>$data["set"],'condicion'=>$data["condicion"]);
		$query=$bd->task($dato);
		if ($query) {
			$result=array('error'=>false,'mensaje'=>"Se actualizo correctamente los datos");
		}else{
			$result=array('error'=>true,'mensaje'=>"No se pudo actualizar los datos" );
		}
		return $result;
	}
	public function insert( $data ){
		include_once("cado.php");
		$bd=new Cado();
		$dato=array('accion'=>'insert','table'=>$data["table"],'values'=>$data["values"] );
		$query=$bd->task($dato);
		if ($query) {
			$result=array('error'=>false,'mensaje'=>"Registro exitoso");
		}else{
			$result=array('error'=>true,'mensaje'=>"No se pudo registrar " );
		}
		return $result;
	}
	public function delete($data){
		include_once("cado.php");
		$bd=new Cado();
		$dato=array('accion'=>'delete','table'=>$data["table"],'condicion'=>$data["condicion"]);
		$query=$bd->task($dato);
		if ($query) {
			$result=array('error'=>false,'mensaje'=>"Se ha eliminado el registro exitosamente ");
		}else{
			$result=array('error'=>true,'mensaje'=>"No se pudo eliminar el registro.");
		}
		return $result;
	}
}
?>