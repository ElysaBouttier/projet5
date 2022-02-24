<?php

namespace Elysa\Pfive\m;

class BaseManager
{

	protected function dbConnect()
	{
		$_bdd = new \PDO('mysql:host=db5006733242.hosting-data.io; port=3306; dbname=dbs5571368', 'dbu2395203', 'df*Hu!4fJiR8mqt', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING));
		return $_bdd;
	}
}
