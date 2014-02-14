<?php  
class Ruta{
	public function agregar($data){
		$data[punto_inicio]=str_replace("(","",$data[punto_inicio]);
		$data[punto_inicio]=str_replace(")","",$data[punto_inicio]);

		$data[punto_llegada]=str_replace("(","",$data[punto_llegada]);
		$data[punto_llegada]=str_replace(")","",$data[punto_llegada]);

		$data["table"]="cl_ruta";
		$data["values"]=" '$data[fecha]' , $data[carro], $data[cliente], '$data[lugar_salida]', '$data[lugar_llegada]', '$data[distancia]', '$data[tiempo]','$data[punto_llegada]', '$data[punto_inicio]', '$data[carga]' ";
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->insert( $data );
	}

	public function listar(){
		$dato=array("table"=>"cl_ruta");
		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->select( $dato );
	}
	
	public function rastreo( $data){

		$dato=array("table"=>"cl_ruta", "condicion"=> " where id_cl_user=".$data['id_cl_user'].";" );


		include_once("helpers.php");
		$helper=new Helpers();
		return $helper->select( $dato );
	}
}

?>