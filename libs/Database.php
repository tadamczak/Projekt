<?php
class Database extends PDO 
{
	/**
	 * Constructor of Database class.
	 * Creates database connection. Constants specified in config.php
	 * 
	 * @param string $DB_TYPE - constant
	 * @param string $DB_HOST - constant
	 * @param string $DB_NAME - constant
	 * @param string $DB_USER - constant
	 * @param string $DB_PASS - constant
	 */
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) 
    {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST .';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
    }
    
    /**
     * Selects data from database
     * 
     * @param string $sql - SQL statement eg. 'SELECT id, title, content, time FROM news WHERE id = :id'
     * @param array() $array - array of variables in sql statement. eg. array(':id' => $id)
     * @param string $fetchMode - On default PDO::FETCH_ASSOC
     * @return multitype:
     */
    
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        foreach($array as $key => $value){
            $sth->bindValue("$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);         
    }
    
    /**
     * Inserts data to databse
     * 
     * @param array() $table - field names
     * @param array() $data - field values
     */
    public function insert($table, $data)
    {
        ksort($data);
        $fieldNames = implode('`,`', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");    
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    } 
    
    /**
     * Updates record in database
     * 
     * @param array() $table - field names eg. 'news'
     * @param unknown $data - field values eg. array(
                'title' => title,
                'content' => content,
                'time' => time    
        )
     * @param unknown $where - statement variables eg. 'id = id'
     */
    public function update($table, $data, $where)
    {
        ksort($data);
        
        $fieldDetails = NULL;
        foreach ($data as $key => $value){
            $fieldDetails .="`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }    
        $sth->execute();        
    }
    
    /**
     * Deletes record form database
     * 
     * @param string $table - name of table eg. 'news'
     * @param string $where - specifies record eg. "id= '$id'"
     * @param integer $limit - limits deleted records.
     * @return integer 
     */
    
    public function delete($table, $where, $limit =1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}