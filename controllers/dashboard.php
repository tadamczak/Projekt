<?php
class Dashboard extends Controller 
{
	/**
	 * Constructor of Dashboard class
	 */
    public function __construct() 
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('dashboard/js/default.js');
    }
    
    /**
     * Render dashboard default view
     * 
     */
    public function index() 
    {    
        $this->view->render('dashboard/index');
    }
    
    /**
     * Logout user and redirects to login panel
     * (Destroys the session)
     * 
     */
    public static function Logout()
    {
    	Session::destroy();
    	header('location: ' . URL .  'login');
    	exit;
    }
    
    /*
     *  Passes control if xhrInsert() method to model 
     *
     */
    public function xhrInsert()
    {
        $this->model->xhrInsert();
    }
    
    /*
     *  Passes control if xhrGetListings() method to model
     *
     */
    
    public function xhrGetListings()
    {
        $this->model->xhrGetListings();
    }
    
    /*
     *  Passes control if xhrDeleteListing() method to model
     *
     */
    public function xhrDeleteListing()
    {
        $this->model->xhrDeleteListing();
    }
}