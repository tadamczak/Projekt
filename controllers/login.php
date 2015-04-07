<?php
class Login extends Controller 
{
	/**
	 * Contructor of Login class
	 * 
	 * @param none
	 */
    function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * Renders index controller view
     * 
     * @param none
     */
    function index() 
    {
        $this->view->render('login/index');
    }
    
    /**
     * Passes control of login proccess to model.
     * 
     * @Param none
     */
    function run()
    {
        $this->model->run();
    }
}