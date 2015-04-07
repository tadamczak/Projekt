<?php

class Dashboard_Model extends Model 
{
	/**
	 * Contructor of Dashboard_Model class
	 * 
	 *     @param none
	 */
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * Retrives data from form ($_POST) and creates new database record.
     * 
     *     @param none
     *     @return echo last inserted record in json format.
     */
    
    public function xhrInsert() 
    {
        $text = $_POST['text'];
        $user = $_POST['user'];
        
        $this->db->insert('data', array('text' => $text, 'user' => $user));
        /*
         * Make a transcation to make sure you get proper lastInsertId();
         */
        $data = array('text' => $text, 'user' => $user, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
    }
    
    /**
     * Selects all records from 'data' table and echoes them.
     * 
     *     @param none
     *     @return echoes all records from 'data' in json format. 
     */
    
    public function xhrGetListings()
    {
        $result = $this->db->select("SELECT * FROM data");
        echo json_encode($result);
    }
    
    /**
     * Deletes specific record based on $id in $_POST var.
     * 
     *      @param none
     *      @return boolean 
     */
    
    public function xhrDeleteListing()
    {
        $id = (int) $_POST['id'];
        $this->db->delete('data', "id = '$id'");
    }

}