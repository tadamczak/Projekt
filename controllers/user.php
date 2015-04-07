<?php
class User extends Controller 
{
	/**
	 * Constructor of User class.
	 * Calls Auth method handleLogin(). Visible only for logged users. 
	 * @param none
	 */
    public function __construct() 
    {
        parent::__construct();
        Auth::handleLogin();
    }
    
    /**
     * Render user default view.
     * Retrives all users using model method userList() and passes it to the view.
     *
     * @param none
     */
    public function index()
    {
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }
    
    /**
     * Retrives data from form ($_POST) and creates array with data.
     * Passes control to model create() method.
     * Redirects to user controller.
     *
     *     @param none
     */
    public function create()
    {
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        
        $this->model->create($data);
        header('location:'. URL .'user');
    }
    
    /**
     * Retrives single user using model method and passes to view
     *
     * @param integer $id - ID of user to retrive from database.
     */
    public function edit($id)
    {
        $this->view->user = $this->model->getUser($id);
        $this->view->render('user/edit');
    }
    
    /**
     * Saves edited user.
     * Retrives data from form ($_POST) and creates array with data.
     * Passes control to model editSave() method.
     * Redirects to user controller.
     *
     *     @param integer $id - ID of edited user
     */
    public function editSave($id)
    {
        $data = array();
        $data['id'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        
        $this->model->editSave($data, $this->model->getUser($id));
        header('location:'. URL .'user');    
    }
    
    /**
     * Deletes specific user based on passed ID.
     * Redirects control to model.
     *
     * @param integer $id - id of user
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location:'. URL .'user');
    }
    
}