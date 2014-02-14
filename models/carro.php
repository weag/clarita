<?php  
class carro{
	public function listar(){
		$dato=array("table"=>"cl_carro");
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->select( $dato );
	}
	public function listarCarrosDisponibles(){
		$data["table"]="cl_carro as c";
		$data["condicion"]=" where c.id not in ( select id_cl_carro from cl_ruta )";
		//select * from cl_carro as c  where c.id not in ( select id_cl_carro from cl_ruta )
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->select( $data );
	}
	public function editar($data){
		$pre=array("table"=>"cl_carro","condicion"=>" where id=".$data["id"]);
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->select( $pre )->fetch();
	}
	public function insert($data){
		$data["table"]="cl_carro";
		//id	placa_delantera	placa_lateral	modelo	marca	ubicacion
		$data["values"]=" '$data[u_placa_delantera]' , '$data[u_placa_lateral]', '$data[u_modelo]', '$data[u_marca]', '$data[u_ubicacion]' ";
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->insert( $data );
	}
	public function update($data){
		$data["table"]="cl_carro";
		$data["condicion"]=" where id=".$data['u_id'];
		$data["set"]=" marca='$data[u_marca]' , modelo='$data[u_modelo]', placa_delantera='$data[u_placa_delantera]', placa_lateral='$data[u_placa_lateral]' ";
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->update( $data );
	}
	public function eliminar($data){
		$data["table"]="cl_carro";
		$data["condicion"]=" where id=".$data['id'];
		$dato=array("table"=>"cl_carro");
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->delete( $data );
	}
	

}
?>