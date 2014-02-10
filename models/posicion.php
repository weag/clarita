<?php  
/**
* 
*/
class Posicion{
	
	public function setPosition($data){
		include('cado.php');
		$bd=new Cado();
		$values=$data['id_carro'].",'".$data['Lat']."','".$data['Lng']."'" ; 
		$dato=array('accion'=>'insert','table'=>'cl_ubicacion','values'=>$values);
		$query=$bd->task($dato);
		$result;
		if ($query) {
			$result=array('error'=>false,'mensaje'=>"Se ha enviado su ubicación correctamente ");
		}else{
			$result=array('error'=>true,'mensaje'=>"No se pudo enviar su Posición");
		}
		$_SESSION['contenido']=array(
			"titulo"=>"",
			"contenido"=>"templates/panel/inicio.php"
		);
		$_SESSION['mensaje']=$result['mensaje'];
		echo json_encode($result);
	}




	public function rastrear($data){
		include_once("cado.php");
		$bd=new Cado();
		$condicion=" where id=".$data['id_carro'].";";
		$dato=array('accion'=>'select','table'=>'cl_carro','columns'=>" ubicacion ",'condicion'=>$condicion);
		$query=$bd->task($dato);
		$dataUser;
		if ($query->rowCount()==1) {
			$dataUser=$query->fetch();
			$result=array('error'=>false,'mensaje'=>"Consulta exitosa",'data'=>$dataUser);

			
			$_SESSION["rastreo"]=$result;
		}else{
			$result=array('error'=>true,'mensaje'=>"No se encontro el usuario o la contraseña es incorrecta");
			$_SESSION['mensaje']=$result['mensaje'];
			//header ("Location: ../index.php");
			echo $result['mensaje']." -----: ".$data['l-email']." - ".$data['l-password'];
		}
	}
}
?>