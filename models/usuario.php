<?php  
class Usuario{
	public function login($data){
		include_once("cado.php");
		$bd=new Cado();
		$condicion=" where email='".$data['l-email']."' and password='".$data['l-password']."';";
		$dato=array('accion'=>'select','table'=>'cl_user','columns'=>"*",'condicion'=>$condicion);
		$query=$bd->task($dato);
		$dataUser;
		if ($query->rowCount()==1) {
			$dataUser=$query->fetch();
			$result=array('error'=>false,'mensaje'=>"Login exitoso",'data'=>$dataUser);
			$_SESSION['usuario']=$result['data'];
			$_SESSION['contenido']=array(
				"titulo"=>"Bienvenido",
				"contenido"=>"templates/panel/inicio.php",
				"datos"=>$dataUser
			);
			
			$querye="select * from cl_link where id_link in (select id_link from cl_menu where id_tipo=".$_SESSION[usuario][id_tipo]." )";
			$dato=array('accion'=>'query','query'=>$querye);
			$query=$bd->exec($dato);
			$cont=1;
			$menu;
			foreach ($query as $row) {
				$menu[$cont]=$row;
				$cont++;
			}
			$_SESSION['menu']=$menu;

			
		}else{
			$result=array('error'=>true,'mensaje'=>"No se encontro el usuario o la contraseña es incorrecta");
			$_SESSION['mensaje']=$result['mensaje'];
			//header ("Location: ../index.php");
			echo $result['mensaje']." -----: ".$data['l-email']." - ".$data['l-password'];
		}
	}

	public function listar(){
		$dato=array("table"=>"cl_user");
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->select( $dato );
	}
	public function getMenu(){
		include_once("cado.php");
		$bd=new Cado();
		$querye="select * from cl_link where id_link in (select id_link from cl_menu where id_tipo=".$_SESSION[usuario][id_tipo]." )";
		$dato=array('accion'=>'query','query'=>$querye);
		$query=$bd->exec($dato);
		$cont=1;
		$menu;
		foreach ($query as $row) {
			$menu[$cont]=$row;
			$cont++;
		}
		return $menu;
	}

	public function update($data){
		$data["table"]="cl_user";
		$data["condicion"]=" where id_cl_user=".$data['u_id_cl_user'];
		$data["set"]=" nombre='$data[u_nombre]' , email='$data[u_email]', password='$data[u_password]', dni='$data[u_dni]', id_tipo='$data[u_id_tipo]' ";
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->update( $data );
	}
	public function insert($data){
		$data["table"]="cl_user";
		$data["values"]=" '$data[u_nombre]' , '$data[u_email]', '$data[u_password]', '$data[u_dni]', '$data[u_tipo]' ";

		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->insert( $data );
	}

	public function editar($data){
		$pre=array("table"=>"cl_user","condicion"=>" where id_cl_user=".$data["id"]);
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->select( $pre )->fetch();
	}
	public function eliminar($data){
		$data["table"]="cl_user";
		$data["condicion"]=" where id_cl_user=".$data['id'];
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->delete( $data );
	}
}
?>