<?php

class Index_Model extends Model 
{
	/**
	 * Contructor of Index_Model class
	 * @param none
	 */
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * Retrives all posts (id, title, content, time)
     * @return array() 
     */
    public function newsList()
    {
        return $this->db->select('SELECT id, title, content, time FROM news');
    }
    
    /**
     * Retrives specific post from database based on ID.
     * Retrives (id, title, content, time).
     * 
     * @param integer $id
     * @return array()
     */
    public function getNews($id)
    {
        return $this->db->select('SELECT id, title, content, time FROM news WHERE id = :id', array(':id' => $id));
    }
       
    /**
     * Creates new post record in database.
     * 
     * @param array() $data - array with post data.
     */
    public function create($data)
    {
        $this->db->insert('news', array(
                'title' => $data['title'],
                'content' => $data['content'],
                'time' => $data['time']
        ));
    }
    
    
    /**
     * Saves edited post.
     * 
     *     @param array() $data - new data of edited post
     */
    public function editSave($data)
    {
        $postData = array(
                'title' => $data['title'],
                'content' => $data['content'],
                'time' => $data['time']    
        );
        
        $sth = $this->db->update('news', $postData, "id = {$data['id']}");
    }
    
    /**
     * Deletes specific post based on passed ID.
     *
     * @param integer $id
     */
    public function delete($id)
    {
        $this->db->delete('news', "id= '$id'");
    }
}