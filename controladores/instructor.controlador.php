<?php

class ControladorInstructor{

	/*============================================
	Mostrar todos los registros
	============================================*/

	public function index($page){


		if ($page != null) {
			
			/*============================================
			Mostrar instructores con paginación
			============================================*/

			$cantidad = 10;
			$desde = ($page-1)*$cantidad;

			$instructor = ModeloInstructor::index("instructor", $cantidad, $desde);

		}else{

			/*============================================
			Mostrar todos los instructores
			============================================*/

			$instructor = ModeloInstructor::index("instructor", null, null);

		}

		
		if (!empty($instructor)) {
			

			$json = array(
				"status"=>200,
				"total_registros"=>count($instructor),
				"detalle"=> $instructor
			);

			echo json_encode($json, true);
			return;
		}else{

			$json = array(
				"status"=>200,
				"total_registros"=>0,
				"detalle"=> "No hay ningún instructor registrado"
			);

			echo json_encode($json, true);
			return;

		}

	}
	/*============================================
	Crear un instructor
	============================================*/

	public function create($datos){
		
		/*============================================
		Validar datos
		============================================*/

		foreach ($datos as $key => $valueDatos) {
	
			if (isset($ValueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $ValueDatos)) {

				$json = array(
					"status"=>404,
					"detalle"=>"Error en el campo nombre".$key
				);

				echo json_encode($json, true);
				return;
			}
		}

		/*============================================
		Validar que el RFC no esté repetido
		============================================*/

		$instructor = ModeloInstructor::index("instructor", null, null);
		foreach ($instructor as $key => $value) {
			
			if ($value->RFC == $datos["RFC"]) {

				$json = array(
					"status"=>404,
					"detalle"=>"El RFC ya existe en la base de datos"
				);

				echo json_encode($json, true);
				return;
			}
			
		}

		/*============================================
		Llevar datos al modelo
		============================================*/

		$datos = array( "APELLIDO_MATERNO"=>$datos["APELLIDO_MATERNO"],
						"APELLIDO_PATERNO"=>$datos["APELLIDO_PATERNO"],
						"FORMACION"=>$datos["FORMACION"],
						"NOMBRE"=>$datos["NOMBRE"],
						"RFC"=>$datos["RFC"],
						"SEXO"=>$datos["SEXO"]);


		$create = ModeloInstructor::create("instructor", $datos);
		/*============================================
		Respuesta del modelo
		============================================*/

		if ($create == "ok") {

			$json = array(
				"status"=>200,
				"detalle"=>"Su registro ha sido guardado"
			);

			echo json_encode($json, true);
			return;
		}
	}
	/*============================================
	Mostrando un solo instructor
	============================================*/

	public function show($id){
			
		/*============================================
		Mostrar todos los instructores
		============================================*/

		$instructor = ModeloInstructor::show("instructor", $id);

		if (!empty($instructor)) {
			

			$json = array(
				"status"=>200,
				"detalle"=> $instructor
			);

			echo json_encode($json, true);
			return;
		}else{

			$json = array(
				"status"=>200,
				"total_registros"=>0,
				"detalle"=> "No hay ningún instructor registrado"
			);

			echo json_encode($json, true);
			return;

		}

	}
	/*============================================
	Editar un instructor
	============================================*/

	public function update($id, $datos){

		/*============================================
		Validar datos
		============================================*/

		foreach ($datos as $key => $valueDatos) {
	
			if (isset($ValueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $ValueDatos)) {

				$json = array(
					"status"=>404,
					"detalle"=>"Error en el campo nombre".$key
				);

				echo json_encode($json, true);
				return;
			}

			/*============================================
			Llevar datos al modelo
			============================================*/

			$datos = array( "ID_INSTRUCTOR"=>$id,
							"NOMBRE"=>$datos["NOMBRE"],
							"APELLIDO_PATERNO"=>$datos["APELLIDO_PATERNO"],
							"APELLIDO_MATERNO"=>$datos["APELLIDO_MATERNO"],
							"SEXO"=>$datos["SEXO"],
							"RFC"=>$datos["RFC"],
							"FORMACION"=>$datos["FORMACION"]);

			$update = ModeloInstructor::update("instructor", $datos);
			/*============================================
			Respuesta del modelo
			============================================*/

			if ($update == "ok") {

				$json = array(
					"status"=>200,
					"detalle"=>"Su registro ha sido actualizado"
				);

				echo json_encode($json, true);
				return;
			}
		}
	}
	/*============================================
	Borrar instructor
	============================================*/

	public function delete($id){

		/*============================================
		Llevar datos al modelo
		============================================*/

		$delete = ModeloInstructor::delete("instructor", $id);
		/*============================================
		Respuesta del modelo
		============================================*/

		if ($delete == "ok") {

			$json = array(
				"status"=>200,
				"detalle"=>"Se ha borrado con éxito"
			);

			echo json_encode($json, true);
			return;
		}
	}
}