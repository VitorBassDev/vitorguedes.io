<?php

namespace Vitor\Database;

abstract class Connection
{

	private static $conn;

	public static function getConn()
	{
		if(!self::$conn){
			/**APONTAMENTO PARA O BANCO EM LOCALHOST 
			* self::$conn = new \PDO('mysql: host=localhost; dbname=portfolio', 'root', '');
			*/
			/**APONTAMENTO PARA O BANCO NO SERVIDOR DA 000WEBHOST **/
			self::$conn = new \PDO('
									mysql: host=localhost;
									dbname=id13888523_projetovitor',
									'id13888523_vitor', 'MAIStecnologia0800@');
		}

		return self::$conn;
		
	}
}