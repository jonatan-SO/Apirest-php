<?php

$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
	
	$instructor = new ControladorInstructor();
	$instructor -> index($_GET["page"]);

}else{

	if (count(array_filter($arrayRutas)) == 0) {

		/*============================================
		Cuando no se hace ninguna petición a la API
		============================================*/

		$json = array(
			"detalle" => "no encontrado 1" 
		);

		echo json_encode($json, true);
		return;
	}else{
		/*============================================
		Cuando pasamos solo un índice en el array $arrayRutas
		============================================*/

		if (count(array_filter($arrayRutas)) == 1) {

			/*============================================
			Cuando se hace peticiones desde instructor
			============================================*/

			if (array_filter($arrayRutas)[1] == "instructor") {
				
				/*============================================
				Peticiones GET
				============================================*/

				if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {
					
					$instructor = new ControladorInstructor();
					$instructor -> index(null);
				}
				/*============================================
				Peticiones POST
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

					/*============================================
					Capturar datos
					============================================*/

					$datos = array( "NOMBRE"=>$_POST["NOMBRE"],
									"APELLIDO_PATERNO"=>$_POST["APELLIDO_PATERNO"],
									"APELLIDO_MATERNO"=>$_POST["APELLIDO_MATERNO"],
									"SEXO"=>$_POST["SEXO"],
									"RFC"=>$_POST["RFC"],
									"FORMACION"=>$_POST["FORMACION"]);

					$crearInstructor = new ControladorInstructor();
					$crearInstructor -> create($datos);

					echo '<pre>'; print_r($_SERVER["REQUEST_METHOD"]); echo '</pre>';
					
					return;

				}else{
					$json = array(
						"detalle" => "no encontrado 2" 
					);

					echo json_encode($json, true);
					return;
				}
			}else{
				$json = array(
					"detalle" => "no encontrado 3" 
				);

				echo json_encode($json, true);
				return;
			}	
		}else{

			/*============================================
			Cuando se hace peticiones desde un solo instructor
			============================================*/

			if (array_filter($arrayRutas)[1] == "instructor" && is_numeric(array_filter($arrayRutas)[2])) {

				/*============================================
				Peticiones GET
				============================================*/

				if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {
					
					$instructor = new ControladorInstructor();
					$instructor -> show(array_filter($arrayRutas)[2]);
				}
				/*============================================
				Peticiones PUT
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "PUT") {

					/*============================================
					Capturar datos
					============================================*/

					$datos = array();
					
					parse_str(file_get_contents('php://input'), $datos);

					$editarInstructor = new ControladorInstructor();
					$editarInstructor -> update(array_filter($arrayRutas)[2], $datos);
				}
				/*============================================
				Peticiones DELETE
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "DELETE") {
					
					$borrarInstructor = new ControladorInstructor();
					$borrarInstructor -> delete(array_filter($arrayRutas)[2]);
				}else{
					$json = array(
						"detalle" => "no encontrado 4" 
					);

					echo json_encode($json, true);
					return;
				}
			}else{
				$json = array(
					"detalle" => "no encontrado 5" 
				);

				echo json_encode($json, true);
				return;
			}
		}
	}
}