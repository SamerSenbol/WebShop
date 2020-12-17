<?php
class dbClass
{
	private $con;

	function connect()
	{
		include_once dirname(__FILE__).'/Config.php';

		$this->con = new mysqli(DB_HOST,
			DB_USER,DB_PASSWORD,DB_NAME);

		if (mysqli_connect_errno()) {
			
			echo "Failed to connect with Database".mysqli_connect_err();
		}

		return $this->con;
	}
}
?>