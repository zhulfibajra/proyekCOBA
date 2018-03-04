<?php 
    session_start();
    	
    class Connection 
    {	
    	protected $local 	  	="localhost";
    	protected $user			="root";
    	protected $pass 		="";
    	protected $database 	="dbsiswa";

    	public function getConnection()
    	{
  			$connent = new mysqli($this->local,$this->user,$this->pass,$this->database);
    		return $connent;
    	}
    }  

    $connection = new Connection();
  	$connent = $connection->getConnection();

?>