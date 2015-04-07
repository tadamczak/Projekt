<?php
class Help extends Controller 
{
	/**
	 * Constructor of Help class
	 */	
    function __construct() 
    {
        parent::__construct();

    }
    
    /**
     * Render Help default view
     * 
     */    
    function index() 
    {
        $this->view->render('help/index');    
    }
}