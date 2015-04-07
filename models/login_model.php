<?php
class Login_Model extends Model
{
	/**
	 * Contructor of Login_Model class
	 * 
	 * @param none
	 */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Login proccess.
     * Checks if user data (passed through $_POST) exists in database.
     * If it matches one record method initialize Session.
     * Sets role and logged - true.
     * If not redirects to default login controller
     * 
     * @param none
     */
    public function run()
    {
        $sth =$this->db->prepare("SELECT id, login, role FROM users WHERE
                login = :login AND password = :password");
        $sth->execute(array(
                ':login' => $_POST['login'],
                ':password' => Hash::create('md5',$_POST['password'],HASH_KEY)
        ));
        
        $data = $sth->fetch();
        
        $count = $sth->rowCount();
        if ($count > 0){
            // login
            Session::init();
            Session::set('login', $data['login']);
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }     
    }
}