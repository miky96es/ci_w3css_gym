<?php

/**
 * Created by IntelliJ IDEA.
 * User: miguel
 * Date: 22/02/17
 * Time: 22:19
 */
class Activity
{
	var $nombre;
	var $descripcion;
	var $id;
	function __construct($nombre,$descripcion,$id)
	{
		$this->nombre=$nombre;
		$this->descripcion=$descripcion;
		$this->id=$id;
	}

	/**
	 * @return mixed
	 */
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	/**
	 * @return mixed
	 */
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * @param mixed $descripcion
	 */
	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	/**
	 * @param mixed $nombre
	 */
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
}
