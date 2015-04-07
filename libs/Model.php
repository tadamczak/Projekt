<?php
class Model 
{
	/**
	 * Construct Model class
	 * Establish database connection using Database class.
	 */
    function __construct() 
    {
        try {
        	$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        }
        catch (PDOException $ex){
        	echo 'Database connection failed';
        	die();  	
        }
    }
}
