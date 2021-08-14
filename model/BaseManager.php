<?php

namespace model;


class BaseManager
{

	protected function dbConnect()
	{
		$_bdd = new \PDO('mysql:host=localhost; port=3306; dbname=portefolio', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING));
		return $_bdd;
	}
}
