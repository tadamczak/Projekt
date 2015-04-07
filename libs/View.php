<?php
class View 
{
	/**
	 * Constructor of View class
	 */
    function __construct() 
    {
    }
    
    /**
     * 
     * @param string $name - name of view to render
     * @param string $NotInclude - default = False. On true omits rendering header$footer.
     */
    public function render($name, $NotInclude = false)
    {    
        if ($NotInclude) {
            require 'views/' .$name . '.php';
        } else {
            require 'views/header.php';
            require 'views/' .$name . '.php';
            require 'views/footer.php';
        }    
    }
}