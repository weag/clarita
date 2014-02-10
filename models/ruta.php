<?php  
class Ruta{
	public function agregar($data){
		$data[punto_llegada]=str_replace("(","",$data[punto_llegada]);
		$data[punto_llegada]=str_replace(")","",$data[punto_llegada]);

		$data["table"]="cl_ruta";
		$data["values"]=" '$data[fecha]' , $data[carro], $data[cliente], '$data[punto_llegada]', '$data[punto_inicio]' ";
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
	
}



?>