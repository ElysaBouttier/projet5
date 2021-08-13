<?php

namespace Model;


class BaseManager
{

	protected function dbConnect()
	{
		$_bdd = new \PDO('mysql:host=localhost; port=3306; dbname=dbs2109890', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING));
		return $_bdd;
	}
}
