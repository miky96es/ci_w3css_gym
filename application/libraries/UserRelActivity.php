<?php

/**
 * Created by IntelliJ IDEA.
 * User: miguel
 * Date: 22/02/17
 * Time: 22:41
 */
class UserRelActivity
{
	var $email;
	var $id;
	var $date;

	function __construct($email,$id,$date)
	{
		$this->date=$date;
		$this->id=$id;
		$this->email=$email;
	}

	/**
	 * @return mixed
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $date
	 */
	public function setDate($date)
	{
		$this->date = $date;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}
}
