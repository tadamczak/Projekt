<?php

class User_Model extends Model 
{   
	/**
	 * Contructor of User_Model class
	 * @param none
	 */
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * Retrives all users (id, login, role)
     * @return array()
     */
    public function userList()
    {
        return $this->db->select('SELECT id, login, role FROM users');
    }
    
    /**
     * Retrives specific user from database based on ID.
     * Retrives (id, login, password, role).
     *
     * @param integer $id - id of user
     * @return array()
     */
    public function getUser($id)
    {
        return $this->db->select('SELECT id, login, password, role FROM users WHERE id = :id', array(':id' => $id));
    }
    
    /**
     * Creates new user record in database.
     *
     * @param array() $data - array with user data.
     */
    public function create($data)
    {
        $this->db->insert('users', array(
                'login' => $data['login'],
                'password' => Hash::create('md5',$data['password'],HASH_KEY),
                'role' => $data['role']
        ));
    }
    
    /**
     * Saves edited user. 
     * Checks if password was changed. In case change Hashes new password.
     *
     *     @param array() $data - new data of edited user
     */
    public function editSave($data, $old)
    {    
        if($old[0]['password'] == $data['password']){
            $postData = array(
                    'login' => $data['login'],
                    'password' => $data['password'],
                    'role' => $data['role']       
            );
        } else {
            $postData = array(
                'login' => $data['login'],
                'password' => Hash::create('md5',$data['password'],HASH_KEY),
                'role' => $data['role']
            );
        }
        $sth = $this->db->update('users', $postData, "id = {$data['id']}");
    }
    
    /**
     * Deletes specific user based on passed ID.
     *
     * @param integer $id
     */
    public function delete($id)
    {
    	$this->db->delete('users', "id= '$id'");
    }
}