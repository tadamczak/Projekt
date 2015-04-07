<?php
class Session 
{
	/**
	 * Start session
	 */
    public static function init()
    {
        @session_start();
    }
    
    /**
     * 
     * @param string $key - name of $_SESSION key to set
     * @param string $value - value of $_SESSION key to set
     */
    public static function set($key, $value) 
    {    
        $_SESSION[$key] = $value;
    }
    /**
     * 
     * @param  string $key - name of $_SESSION key to retrive
     * @return string - return $_SESSION key
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    }
    public static function destroy()
    {
        session_destroy();
    }
}