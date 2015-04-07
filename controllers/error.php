<?php
class Error extends Controller
{
	/**
	 * Constructor of Error class
	 */
    function __construct() 
    {
        parent::__construct();
        ini_set('display_errors','0');
    }
    
    /**
     * Render error default view
     *
     */
    function index() 
    {
        $this->view->render('error/index');
    }
    
}