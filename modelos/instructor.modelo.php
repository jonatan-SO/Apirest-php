<?php

require_once "conexion.php";

class ModeloInstructor{

	/*============================================
	Mostrar todos los instructores
	============================================*/

	static public function index($tabla, $cantidad, $desde){

		if ($cantidad != null) {
			
			$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_INSTRUCTOR, $tabla.NOMBRE, $tabla.APELLIDO_PATERNO, $tabla.APELLIDO_MATERNO, $tabla.SEXO, $tabla.RFC, $tabla.FORMACION FROM $tabla LIMIT $desde, $cantidad");

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_INSTRUCTOR, $tabla.NOMBRE, $tabla.APELLIDO_PATERNO, $tabla.APELLIDO_MATERNO, $tabla.SEXO, $tabla.RFC, $tabla.FORMACION FROM $tabla");

		}

		$stmt -> execute();
		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		$stmt -> close();
		$stmt = null;
	}

	/*============================================
	Creacion de un instructor
	============================================*/

	static public function create($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO, SEXO, RFC, FORMACION) VALUES (:NOMBRE, :APELLIDO_PATERNO, :APELLIDO_MATERNO, :SEXO, :RFC, :FORMACION)");

		$stmt -> bindParam(":NOMBRE", $datos["NOMBRE"], PDO::PARAM_STR);
		$stmt -> bindParam(":APELLIDO_PATERNO", $datos["APELLIDO_PATERNO"], PDO::PARAM_STR);
		$stmt -> bindParam(":APELLIDO_MATERNO", $datos["APELLIDO_MATERNO"], PDO::PARAM_STR);
		$stmt -> bindParam(":SEXO", $datos["SEXO"], PDO::PARAM_STR);
		$stmt -> bindParam(":RFC", $datos["RFC"], PDO::PARAM_STR);
		$stmt -> bindParam(":FORMACION", $datos["FORMACION"], PDO::PARAM_STR);
		
		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
	/*============================================
	Mostrar un solo instructor
	============================================*/

	static public function show($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_INSTRUCTOR, $tabla.NOMBRE, $tabla.APELLIDO_PATERNO, $tabla.APELLIDO_MATERNO, $tabla.SEXO, $tabla.RFC, $tabla.FORMACION FROM $tabla WHERE $tabla.ID_INSTRUCTOR =:ID_INSTRUCTOR");
		
		$stmt -> bindParam(":ID_INSTRUCTOR", $id, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		$stmt -> close();
		$stmt = null;
	}

	/*============================================
	Actualizacion de un instructor
	============================================*/

	static public function update($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOMBRE=:NOMBRE,APELLIDO_PATERNO=:APELLIDO_PATERNO,APELLIDO_MATERNO=:APELLIDO_MATERNO,SEXO=:SEXO,RFC=:RFC, FORMACION=:FORMACION WHERE ID_INSTRUCTOR = :ID_INSTRUCTOR");

		$stmt -> bindParam(":ID_INSTRUCTOR", $datos["ID_INSTRUCTOR"], PDO::PARAM_INT);
		$stmt -> bindParam(":NOMBRE", $datos["NOMBRE"], PDO::PARAM_STR);
		$stmt -> bindParam(":APELLIDO_PATERNO", $datos["APELLIDO_PATERNO"], PDO::PARAM_STR);
		$stmt -> bindParam(":APELLIDO_MATERNO", $datos["APELLIDO_MATERNO"], PDO::PARAM_INT);
		$stmt -> bindParam(":SEXO", $datos["SEXO"], PDO::PARAM_INT);
		$stmt -> bindParam(":RFC", $datos["RFC"], PDO::PARAM_INT);
		$stmt -> bindParam(":FORMACION", $datos["FORMACION"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
	/*============================================
	Borrar instructor
	============================================*/

	static public function delete($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID_INSTRUCTOR = :ID_INSTRUCTOR");

		$stmt -> bindParam(":ID_INSTRUCTOR", $id, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
}