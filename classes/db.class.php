<?php

class database {

	private $connection;

	//constructor
	public function __construct (PDO $connection = null){
      	$this->connection = $connection;
        if ($this->connection == null) {
            try{
                $this->connection = new PDO('mysql:host=localhost;dbname=dbinfosis', 'root', 'mysql');
                $this->connection->exec('SET NAMES "utf8"'); //UTF8 to support special characters
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //error reporting
            }
            catch (PDOException $e){
                echo("Erro de ligação:" . $e);
                exit();
            }
        }
    }
    
    public function getCon() { return $this->connection; }
     
}

?>