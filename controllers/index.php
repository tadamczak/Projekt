<?php
class Index extends Controller 
{
	/**
	 * Constructor of Index class
	 * (Automatically loads JavaScript file intended only for this view)
	 * 
	 * @param none
	 */
    public function __construct() 
    {
        parent::__construct();
        $this->view->js = array('index/js/default.js');
    }
    
    /**
     * Render dashboard default view.
     * Retrives all news using model method newsList() and passes it to the view.
     * 
     * @param none
     */
    public function index()
    {
        $this->view->newsList = $this->model->newsList();
        $this->view->render('index/index');    
    }
    
   /**
     * Retrives data from form ($_POST) and creates array with data.
     * Passes control to model create() method.
     * Redirects to index controller.
     * 
     *     @param none
     */   
    public function create()
    {
        $data = array();
        $data['title'] = $_POST['title'];
        $data['content'] = $_POST['content'];
        $data['time'] = $_POST['time'];
    
        $this->model->create($data);
        header('location:'. URL .'index');
    }
    
    /**
     * Retrives single post using model method and passes to view
     * 
     * @param integer $id - ID of post to retrive from database.
     */
    
    public function edit($id)
    {
        $this->view->news = $this->model->getNews($id);
        $this->view->render('index/edit');
    }
    
    /**
     * Saves edited post.
     * Retrives data from form ($_POST) and creates array with data.
     * Passes control to model editSave() method.
     * Redirects to index controller.
     *
     *     @param integer $id - ID of edited post
     */
    
    public function editSave($id)
    {
        $data = array();
        $data['id'] = $id;
        $data['title'] = $_POST['title'];
        $data['content'] = $_POST['content'];
        $data['time'] = $_POST['time'];
    
        $this->model->editSave($data);
        header('location:'. URL .'index');
    }
    
    /**
     * Deletes specific post based on passed ID.
     * Redirects control to model.
     * 
     * @param integer $id
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location:'. URL .'index');
    }    
}