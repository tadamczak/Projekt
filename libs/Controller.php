<?php
class Controller 
{
	/**
	 * Constructor of Controller class
	 * 
	 * @param none
	 */
    function __construct() 
    {
        $this->view = new View();        
    }
    
    /**
     * Autoloads model.
     * 
     * @param string $name - model name ex. 'index'
     */
    public function LoadModel($name)
    {
        $path = 'models/' . $name . '_model.php';
        if (file_exists($path)){
            require 'models/' . $name . '_model.php';
            $modelName = $name . '_model';
            $this->model = new $modelName();
        }
    }
}